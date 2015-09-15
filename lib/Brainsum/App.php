<?php

namespace Brainsum;

class App
{
    /** @var Config */
    protected static $_config;
    protected static $_scheme;
    protected static $_root;
    protected static $_base;

    public static function init($root, $config) {
        self::$_config  = new Config($config);
        self::$_base    = implode('://', [self::getScheme(), $_SERVER['SERVER_NAME']]);
        self::$_root    = trim($root, "\t\\/ ");

        echo self::render('view/layout', true);
    }

    public static function getScheme() {
        $scheme = isset($_SERVER['REQUEST_SCHEME']) === true ? $_SERVER['REQUEST_SCHEME'] : null;
        $scheme !== null && $scheme = $_SERVER['SERVER_PORT'] == 80 ? 'http' : 'https';

        return $scheme;
    }

    public static function getConfig() {
        return self::$_config;
    }

    public static function getUrl($path = null) {
        return $path === null ? self::$_base : implode('/', [self::$_base, $path]);
    }

    public static function getPath($path = null) {
        return $path === null ? self::$_root : implode(DIRECTORY_SEPARATOR, [self::$_root, $path]);
    }

    public static function render($path, $sign = false) {
        ob_start();
        include($path . '.php');

        $html = preg_replace(['/(\r|\n|\t|\s{2})/', '/<!--[^\[](.|\s)*?-->/'], '', ob_get_clean());

        if ($sign === true) {
            $html.= "\r\n\r\n<!-- ".implode(" -->\r\n<!-- ", self::$_config->get('dev', []))." -->";
        }
        return $html;
    }

    public static function get($path, $encode) {

    }
}