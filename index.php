<?php

// PSR-0 NAMESPACE REGISTRATION

spl_autoload_register(function ($className) {
    include implode(DIRECTORY_SEPARATOR, array('lib', str_replace('\\', '/', $className).'.php'));
});

// Initializing application
Brainsum\App::init('cs');