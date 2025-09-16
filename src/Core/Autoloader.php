<?php

spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../Models/' . $class . '.php',
        __DIR__ . '/../Controllers/' . $class . '.php',
        __DIR__ . '/' . $class . '.php'
    ];
    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});