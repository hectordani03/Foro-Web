<?php
require_once '../config/app.php';
require_once '../autoload.php';
session_start();
if (isset($_GET['views'])) {

    $url = explode("/", $_GET['views']);
} else {
    $url = ["index"];
}

use user\controllers\viewsController;
use user\controllers\loginController;
use user\models\mainModel;

$viewsController = new viewsController();
$insLogin = new loginController();

$model = new mainModel();

$views = $viewsController->getViewsControlleruser($url[0]);

if ($views == "404") {
    require_once "./views/content/404.php";
} elseif ($views == "index") {
    require_once "./views/inc/userHeader.php";
    require_once "./views/userviews/" . $views . ".php";
    require_once "./views/inc/userFooter.php";
} else {

    if (file_exists($views)) {
        $directory = dirname($views);

        if (strpos($directory, 'userviews') !== false) {
            if (empty($_SESSION['id']) && $views == "./views/userviews/profile.php") {
                $insLogin->logoutController();
            }
            require_once "./views/inc/userHeader.php";
            require_once $views;
            require_once "./views/inc/userFooter.php";
        } else {
            require_once $views;
        }
    }
}
