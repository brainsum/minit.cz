<?php

namespace Brainsum;

class Config
{
    protected $data = null;

    public function __construct($config) {
        $this->data = include("config/{$config}.php");
    }

    public function get($path, $fallback = null) {
        if (is_array($path) === true) {
            $data = array();

            foreach ($path as $key) $data[] = $this->get($key, $fallback);
            return $data;
        }
        $data = $this->data;

        if ($this->data !== null) {
            $path = explode('.', $path);

            foreach ($path as $name) {
                if (isset($data[$name]) === false) {
                    $data = $fallback;
                    break;
                }
                $data = $data[$name];
            }
        }
        return $data === $fallback || is_string($data) === false ? $data : htmlspecialchars($data);
    }
}