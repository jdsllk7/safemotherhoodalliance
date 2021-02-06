<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if (strpos($url, 'includes') !== false) {
        $path = "../classes/";
    } else {
        $path = "classes/";
    }
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    var_dump(file_exists($fullPath));
    var_dump($fullPath);
    
    if (!file_exists($fullPath)) {
        return false;
    } else {
        // var_dump($fullPath);
    }
    require_once $fullPath;
}
