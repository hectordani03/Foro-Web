<?php
require_once './config/app.php';
require_once './autoload.php';

if (isset($_GET['views'])) {

    $url = explode("/", $_GET['views']);
} else {
    $url = ["login"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./app/layouts/inc/header.php"; ?>
</head>

<body>

    <?php

    use app\controllers\viewsController;
    use app\controllers\loginController;

    $viewsController = new viewsController();
    $insLogin = new loginController();

    $views = $viewsController->getViewsController($url[0]);

    if ($views == "login") {
        header("Location: ../forum/" . $views . ".php");
    } elseif ($views == "404") {
        require_once "./app/layouts/views/" . $views . "-view.php";
    } else {
        session_start();
        if (empty($_SESSION['id']) || empty($_SESSION['username'])) {
            $insLogin->logoutController();
        }
        require_once $views;
        require_once "./app/layouts/inc/navbar.php";

    }
    require_once "./app/layouts/inc/footer.php";

    ?>
</body>

</html>