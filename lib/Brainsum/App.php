<?php

namespace Brainsum;

use ReCaptcha\ReCaptcha;

class App
{
    /** @var Config - Configuration options */
    protected static $_config;

    /** @var string - Protocol scheme (http, https) */
    protected static $_scheme;

    /** @var Router - Path/logic abstraction */
    protected static $_router;

    /** @var string - Domain root of the application */
    protected static $_base;

    public static function init($config) {
        if (isset($_SESSION) === false) {
            session_start();
        }
        self::$_base    = implode('://', array(self::getScheme(), $_SERVER['SERVER_NAME']));
        self::$_config  = new Config($config);

        $path = substr($_SERVER['REQUEST_URI'], 1);

        try {
            if ($path === '' || $path === false) {
                $href = null;

                if (empty($_POST) === false && ($form = self::validate($_POST)) !== false) {
                    $href = $_SESSION['page'];
                    self::send(self::$_config->get('mail.send.name'), (array) $form);
                }
                self::redirect($href);
            }
            self::$_router = new Router($path);

            $_SESSION['page'] = self::$_router->getPath();
            echo self::render('layout', true);
        }
        catch (\Exception $e) {
            self::redirect();
        }
    }

    public static function getScheme() {
        $scheme = isset($_SERVER['REQUEST_SCHEME']) === true ? $_SERVER['REQUEST_SCHEME'] : null;
        $scheme === null && $scheme = $_SERVER['SERVER_PORT'] == 80 ? 'http' : 'https';

        return $scheme;
    }

    public static function getConfig() {
        return self::$_config;
    }

    public static function getPage() {
        return self::$_router->getPage();
    }

    public static function getRouter() {
        return self::$_router;
    }

    public static function getMenu() {
        $menu = array();
        $data = self::$_config->get('path', array());
        $path = self::$_router->getPath();

        foreach ($data as $route => $page) {
            $menu[] = array(
                'path'  => $route,
                'name'  => $page['title'],
                'mode'  => $route === $path
            );
        }
        return $menu;
    }

    public static function getUrl($path = null) {
        return $path === null ? self::$_base : implode('/', array(self::$_base, $path));
    }

    public static function getAssetUrl($path) {
        $file = "assets/{$path}";
        $time = null;

        if (file_exists($file) === true) {
            $time = fileatime($file);
        }
        if ($time !== null) {
            $path.= "?v={$time}";
        }
        return $path;
    }

    public static function getToken($renew = false) {
        return $renew === true ? $_SESSION['token'] = sha1(mt_rand(0, 64000)) : $_SESSION['token'];
    }

    public static function redirect($path = null, $http = 301) {
        header('Location: ' . ($path === null ? self::getConfig()->get('home', '/') : $path), $http);
        exit;
    }

    public static function render($path, $sign = false) {
        ob_start();
        include("view/{$path}.html.php");

        $html = self::shrink(ob_get_clean());

        if ($sign === true) {
            $html.= "\r\n\r\n<!-- ".implode(" -->\r\n<!-- ", self::$_config->get('sign', (array) date('Y')))." -->";
        }
        return $html;
    }

    protected static function shrink($html) {
        return preg_replace(array('/(\\r|\\n|\\t|\\s{2})+/', '/<!--[^\[].*?-->/'), '', (string) $html);
    }

    public static function send($target, array $data) {
        include 'lib/PhpMailer/PHPMailerAutoload.php';

        $html = '';
        $send = false;

        if (isset($data['email']) === true) {
            $send = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        }
        foreach ($data as $key => $value) {
            if ($key === 'g-recaptcha-response' || $key === 'token') {
                continue;
            }
            $html.= sprintf('<strong>%s:</strong> <span>%s</span><br />',
                htmlspecialchars($key),
                htmlspecialchars($value)
            );
        }
        $html.= sprintf("<br/><br/><small>%s</small>",
            $send === false ? "This is an auto-generated message, please do not answer!" : "You can reply to this email (which will be sent to the given email address)."
        );
        $mail = new \PHPMailer();
        $mail->setFrom(
            self::$_config->get('mail.from.mail', 'dev@brainsum.com'),
            self::$_config->get('mail.from.name')
        );
        if ($send !== false) {
            $mail->addReplyTo($send, (string) $data['name']);
        }
        $mail->addAddress($target);
        $mail->msgHTML($html);
        $mail->Subject = '[FORM.Submit] Minit Bohemia (Pro partnery)';
        $mail->AltBody = strip_tags(str_replace('<br/>', "\r\n", $html));

        $mail->send();
    }

    public static function validate($post) {
        if ($post['token'] !== self::getToken()) {
            throw new \Exception("Invalid CSRF token");
        }
        foreach ($post as $key => & $value) {
            if ($key !== 'cooperation' && true === empty($value)) {
                return false;
            }
        }
        $captcha = new ReCaptcha(self::$_config->get('google.recaptcha'));

        if ($captcha->verify($post['g-recaptcha-response'], $_SERVER['REMOTE_ADDR'])->isSuccess() === false) {
            throw new \Exception("Invalid reCAPTCHA code");
        }
        return $post;
    }
}