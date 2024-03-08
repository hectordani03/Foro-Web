<?php
require_once './config/app.php';
require_once './autoload.php';

if (isset($_GET['views'])) {

    $url = explode("/", $_GET['views']);
} else {
    $url = ["login"];
}
require_once "./app/views/inc/header.php";

use app\controllers\viewsController;
use app\controllers\loginController;

$viewsController = new viewsController();
$insLogin = new loginController();

$views = $viewsController->getViewsController($url[0]);

if ($views == "login" || $views == "404") {
    require_once "./app/views/content/" . $views . ".php";
} else {
    
    session_start();

    // Verificar si el archivo existe
    if (file_exists($views)) {
        // Obtener la ruta del directorio que contiene el archivo
        $directory = dirname($views);
    
        // Verificar si el directorio es 'adminviews'
        if (strpos($directory, 'adminviews') !== false) {
            // Es un archivo dentro de 'adminviews', realizar las validaciones necesarias
            if (empty($_SESSION['id']) || empty($_SESSION['username']) || empty($_SESSION['role'])) {
                $insLogin->logoutController();
            } elseif ($_SESSION['role'] != 3) {
                require_once $views;
                require_once "./app/views/inc/navbar.php";
            } else {
                $insLogin->logoutController();
            }
        } else {
            // Es un archivo fuera de 'adminviews', simplemente cargar el archivo sin el navbar
            require_once $views;
        }
    } 
}
require_once "./app/views/inc/footer.php";
