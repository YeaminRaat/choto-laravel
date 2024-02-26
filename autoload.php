<?php

spl_autoload_register(function ($class_name) {
    // Define the base directory for your PHP files
    $base_dir = __DIR__ . '/';

    // Convert the class name to a file path
    $file = $base_dir . str_replace('\\', '/', $class_name) . '.php';
    // If the file exists, include it
    if (file_exists($file)) {
        include $file;
    }
});