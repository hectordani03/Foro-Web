<?php
    require_once './config/app.php';
    require_once './autoload.php';
    require_once './app/views/inc/session_start.php';

    if (isset($_GET['views'])) {

        $url = explode("/", $_GET['views']);
    } else {
        $url = ["login"];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./app/views/inc/header.php"; ?>
</head>

<body>

<?php

    use app\controllers\viewsController;

    $viewsController = new viewsController();
    $views = $viewsController->getViewsController($url[0]);

    if ($views == "login" || $views == "404") {

        require_once "./app/views/content/" . $views . "-view.php";
    } else {
        require_once $views;
        require_once "./app/views/inc/navbar.php";
    }
    require_once "./app/views/inc/script.php";

?>
</body>

</html>