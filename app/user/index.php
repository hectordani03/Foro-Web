<?php
require_once '../config/app.php';
require_once '../autoload.php';

if (isset($_GET['views'])) {

    $url = explode("/", $_GET['views']);
} else {
    $url = ["index"];
}

use user\controllers\viewsController;
use user\controllers\loginController;

$viewsController = new viewsController();
$insLogin = new loginController();

$views = $viewsController->getViewsControlleruser($url[0]);

if ($views == "index") {
    require_once "./views/userviews/" . $views . ".php";
} elseif ($views == "404") {
    require_once "./views/content/" . $views . ".php";
}else {
    require_once $views;
}

