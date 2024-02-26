<?php 
    require_once './config/app.php';
    require_once 'autoload.php';
    require_once './app/views/inc/session_start.php';

    if(isset($_GET['views'])){

        $url = explode("/", $_GET['views']);
        
    } else {
        $url = ["login"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php require_once "./app/inc/views/header.php"; ?>
</head>
<body>

    <?php require_once "./app/inc/views/script.php"; ?>
</body>
</html>
