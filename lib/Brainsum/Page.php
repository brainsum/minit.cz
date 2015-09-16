<?php

namespace Brainsum;

class Page
{
    protected $language = 'en';
    protected $config;
    protected $block;
    protected $route = '';
    protected $title = '';
    protected $description = '';
    protected $keywords = [];

    public function __construct($route, array $data) {
        $this->config   = App::getConfig();
        $this->route    = $route;
        $this->language = isset($data['lang']) === true ? $data['lang'] : $this->config->get('lang');

        if (false === empty($data['block'])) {
            $this->block = $data['block'];
        }
        if (true === isset($data['title'])) {
            $this->title = $data['title'];
        }
        if (true === isset($data['description'])) {
            $this->title = $data['description'];
        }
        if (true === isset($data['keywords'])) {
            $this->title = (array) $data['keywords'];
        }
    }

    public function getLang() {
        return $this->language;
    }

    public function getRoute() {
        return $this->route;
    }

    public function getTitle($encode = true, $qualified = false) {
        $title = [];

        if ($qualified === true) {
            $title[] = $this->config->get('page.title');
        }
        if ($this->title !== '') {
            $title[] = $this->title;
        }
        $title = implode(' | ', $title);

        return $encode === true ? htmlspecialchars($title) : $title;
    }

    public function getDescription($encode = true) {
        return $encode === true ? htmlspecialchars($this->description) : $this->description;
    }

    public function getKeywords($encode = true, $flatten = false) {
        $keywords = $this->keywords;

        if ($encode === true) foreach ($keywords as & $word) {
            $word = htmlspecialchars($word);
        }
        return $flatten === true ? implode(', ', $keywords) : $keywords;
    }

    public function render() {
        $html = '';

        if ($this->block !== null) foreach ($this->block as $block) {
            $html.= App::render("components/{$block}");
        }
        return $html;
    }

    public function __toString() {
        return $this->render();
    }
}