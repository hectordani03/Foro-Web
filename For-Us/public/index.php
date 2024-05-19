<?php

use app\app;

require_once  '../app/app.php';

app::run();

// session_start();
// if (isset($_GET['views'])) {

//     $url = explode("/", $_GET['views']);
// } else {
//     $url = ["home"];
// }

// use app\controllers\viewsController;
// use app\controllers\loginController;
// use app\controllers\postController;

// use app\models\mainModel;

// $viewsController = new viewsController();
// $insLogin = new loginController();
// $getPosts = new postController();

// $model = new mainModel();

// $views = $viewsController->getViewsControlleruser($url[0]);

// if ($views == "404" || $views == "index") {
//     require_once CONTENT . "404.php";
// } else {

//     if (file_exists($views)) {
//         $directory = dirname($views);
//         if (strpos($directory, 'user') !== false) {
//             if (empty($_SESSION['id']) && $views == USER_VIEWS . "profile.php") {
//                 $insLogin->logoutController();
//             }
//             require_once LAYOUTS_US . "header.php";
//             require_once $views;
//             require_once LAYOUTS_US . "footer.php";
//         } else {
//             require_once $views;
//         }
//     }
// }
