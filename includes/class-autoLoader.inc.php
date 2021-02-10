<?php
spl_autoload_register('AutoLoader');

function AutoLoader($className)
{
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    var_dump(dirname(__DIR__) . '\classes' . DIRECTORY_SEPARATOR . $file . '.php');
    require_once dirname(__DIR__) . '\classes' . DIRECTORY_SEPARATOR . $file . '.php';
    //Make your own path, Might need to use Magics like ___DIR___
}
