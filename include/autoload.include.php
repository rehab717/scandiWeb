<?php

spl_autoload_register(function ($class) {

    $class = strtolower($class);
    $the_path = "includes/{$class}.php";

    if (is_file($the_path) && !class_exists($class)) {
        include $the_path;
    } else {
        die(" This file name {$class}.php was not found");
    }
});
