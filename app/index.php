<?php
require_once './config/app.php';
require_once './autoload.php';

if (isset($_GET['views'])) {

    $url = explode("/", $_GET['views']);
} else {
    $url = ["login"];
}
use user\controllers\viewsController;
use user\controllers\loginController;

$viewsController = new viewsController();
$insLogin = new loginController();

$views = $viewsController->getViewsController($url[0]);

if ($views == "404" || $views == "index") {
    require_once "./user/views/content/404.php";
} else {

    session_start();

    if (file_exists($views)) {
        $directory = dirname($views);
    
        if (strpos($directory, 'adminviews') !== false) {
            if (empty($_SESSION['id']) || empty($_SESSION['username']) || empty($_SESSION['role'])) {
                $insLogin->logoutController();
            } elseif ($_SESSION['role'] != 3) {
                require_once "./user/views/inc/header.php";
                require_once $views;
                require_once "./user/views/inc/navbar.php";
                require_once "./user/views/inc/footer.php";

            } else {
                $insLogin->logoutController();
            }
        } else {
            require_once $views;
        }
    } 
}
