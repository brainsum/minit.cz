<?php

// PSR-0 NAMESPACE REGISTRATION

spl_autoload_register(function ($className) {
    include implode(DIRECTORY_SEPARATOR, array(__DIR__, 'lib', $className.'.php'));
});

// Initializing application
Brainsum\App::init(__DIR__, 'cs');
