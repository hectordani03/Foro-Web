<?php

namespace app;

use app\classes\autoloader as autoloader;
use app\classes\router as router;

error_reporting(E_ALL);
ini_set('display_errors', 1);

class app
{

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {

        $this->initConfig();
        $this->loadFunctions();
        $this->initAutoloader();
        $this->initRouter();

    }

    private function initConfig()
    {
        define('CONFIG', dirname(__DIR__) . DIRECTORY_SEPARATOR);

        if (!file_exists( CONFIG . 'config/config.php')) {
            die('No se encontró el archivo de configuración config.php');
        }
        require_once CONFIG . 'config/config.php';
    }

    private function loadFunctions()
    {
        if (!file_exists(FUNCTIONS . 'main_function.php')) {
            die();
        }
        if (!file_exists(FUNCTIONS . 'email_function.php')) {
            die();
        }
        if (!file_exists(FUNCTIONS . 'strings_function.php')) {
            die();
        }
        if (!file_exists(FUNCTIONS . 'layouts_function.php')) {
            die();
        }
        if (!file_exists(FUNCTIONS . 'img_functions.php')) {
            die();
        }
        require_once FUNCTIONS . 'main_function.php';
        require_once FUNCTIONS . 'email_function.php';
        require_once FUNCTIONS . 'strings_function.php';
        require_once FUNCTIONS . 'layouts_function.php';
        require_once FUNCTIONS . 'img_functions.php';
    }

    private function initAutoloader()
    {
        if (!file_exists(CLASSES . 'autoloader.php')) {
            die('No se encontró la clase autoloader.php');
        }
        require_once CLASSES . 'autoloader.php';
        autoloader::register();
        return;
    }

    private function initRouter()
    {
        if (!file_exists(CLASSES . 'router.php')) {
            die('No se encontró la clase router.php');
        }
        require_once CLASSES . 'Router.php';
        $router = new router();
        $router->route();
    }

    public static function run()
    {
        $app = new self();
        return;
    }
}
