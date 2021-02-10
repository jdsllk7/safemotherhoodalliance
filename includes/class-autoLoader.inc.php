<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $extension = ".class.php";
    if (strpos($className, 'DB') !== false) {
        $fullPath = str_replace("\\", "/", dirname(__DIR__) . "\classes\\" . strtolower($className) . $extension);
    } else {
        $fullPath = str_replace("\\", "/", dirname(__DIR__) . "\classes\\" . $className . $extension);
    }

    // var_dump(($className));
    // var_dump(file_exists($fullPath));
    // var_dump($fullPath);

    if (!file_exists($fullPath)) {
        return false;
    } else {
        require_once $fullPath;
    }
}
