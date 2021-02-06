<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
        if (strpos($url, 'includes') !== false) {
            $path = "../classes/";
        } else {
            $path = "classes/";
        }
    } elseif (strpos($_SERVER['HTTP_HOST'], 'safemotherhoodalliance.org') !== false) {
        $path = "/home/dembebxq/public_html/classes/";
    }

    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    // var_dump(file_exists(strtolower($fullPath)));
    // var_dump($fullPath);

    if (!file_exists(strtolower($fullPath))) {
        return false;
    } else {
        require_once $fullPath;
    }
}
