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
        self::$_base    = implode('://', array(self::getScheme(), $_SERVER['SERVER_NAME']));
        self::$_config  = new Config($config);

        $path = substr($_SERVER['REQUEST_URI'], 1);

        try {
            if ($path === '' || $path === false) {
                $href = null;

                if (empty($_POST) === false && ($form = self::validate($_POST)) !== false) {
                    $href = $_SESSION['page'];
                    self::send(self::$_config->get('send'), (array) $form);
                }
                self::redirect($href);
            }
            self::$_router = new Router($path);

            $_SESSION['page'] = self::$_router->getPath();
            echo self::render('layout', true);
        }
        catch (\Exception $e) {
            print_r($e);die;
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

    public static function isProduction() {
        static $_mode, $_type;

        if ($_type === null) {
            $_type = array('dev', 'local');
        }
        if ($_mode === null) {
            $_mode = explode('.', $_SERVER['SERVER_NAME']);
            $_mode = array_pop($_mode);
            $_mode = in_array($_mode, $_type) === false;
        }
        return $_mode;
    }

    public static function redirect($path = null, $http = 301) {
        header('Location: ' . ($path === null ? self::getConfig()->get('home', '/') : $path), $http);
        exit;
    }

    public static function render($path, $sign = false) {
        ob_start();
        include("view/{$path}.html.php");

        $html = ob_get_clean();
        $html = preg_replace(array('/(\r|\n|\t|\s{2})/', '/<!--[^\[](.|\s)*?-->/'), '', $html);

        if ($sign === true) {
            $html.= "\r\n\r\n<!-- ".implode(" -->\r\n<!-- ", self::$_config->get('sign', (array) date('Y')))." -->";
        }
        return $html;
    }

    public static function send($target, array $data) {
        require_once 'lib/PHPMailer/PHPMailerAutoload.php';
        $html = '';

        foreach ($data as $key => $value) {
            if ($key === 'g-recaptcha-response' || $key === 'token') {
                continue;
            }
            $html.= sprintf('<strong>%s:</strong> <span>%s</span><br />', $key, $value);
        }
        $html.= "<br/><br/><small>This is an auto-generated message, please do not answer!</small>";

        $mail = new \PHPMailer();
        $mail->setFrom($target);
        $mail->addAddress($target);
        $mail->msgHTML($html);
        $mail->Subject = '[FORM.Submit] Fornetti Minit (Contact)';
        $mail->AltBody = strip_tags(str_replace('<br/>', "\r\n", $html));

        if ($mail->send() === false) {
            die($mail->ErrorInfo);
        }
    }

    public static function validate($post) {
        static $_allow;

        if ($_allow === null) {
            $_allow = array('message', 'cooperation');
        }
        foreach ($post as $key => & $value) {
            if (empty($value) === true && in_array($key, $_allow) === false) {
                return false;
            }
            $value = htmlspecialchars(strip_tags($value));
        }
        if ($post['token'] !== self::getToken()) {
            throw new \Exception("Invalid CSRF token");
        }
        $captcha = new ReCaptcha(self::$_config->get('captcha.secret'));

        if ($captcha->verify($post['g-recaptcha-response'], $_SERVER['REMOTE_ADDR'])->isSuccess() === false) {
            throw new \Exception("Invalid reCAPTCHA code");
        }
        return $post;
    }
}