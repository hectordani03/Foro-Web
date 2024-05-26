<?php

namespace app\classes;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($className)
    {
        $className = CLASSES_PATH . str_replace('\\', DS, $className) . '.php';
        if (file_exists($className)) {
            require_once $className;
        } else {
            die("La clase " . $className . " no existe");
        }
        return;
    }
}
