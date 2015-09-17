<?php

/** @var string $_root */
$_root = dirname(__FILE__);

// PSR-0 NAMESPACE REGISTRATION

spl_autoload_register(function ($className) {
    global $_root;
    include implode(DIRECTORY_SEPARATOR, array($_root, 'lib', str_replace('\\', '/', $className).'.php'));
});

// Initializing application
Brainsum\App::init($_root, 'cs');