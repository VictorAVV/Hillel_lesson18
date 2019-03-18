<?php

//используем БД SQLite3 
define('PATHTODB', __DIR__ . '/storage/articles.db');
define('DATEFORMAT', 'Y-m-d H:i:s');
//print_r (\SQLite3::version());

spl_autoload_register(function ($class) {
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_file($path)) {
        require $path;
        return;
    }
    //throw new \LogicException(sprintf('Class "%s" not found in "%s"!', $class, $path));
}); 
