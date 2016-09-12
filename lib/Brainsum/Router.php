<?php

namespace Brainsum;

class Router {
    protected $path;
    protected $page;

    public function __construct($path) {
        if (($config = App::getConfig()->get("path.{$path}", false)) === false) {
            throw new \Exception("No defined path found on config for the route '{$path}'");
        }
        $this->path = $path;
        $this->page = new Page($path, $config);
    }

    public function getPage() {
        return $this->page;
    }

    public function getPath() {
        return $this->path;
    }
}