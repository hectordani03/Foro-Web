<?php
use app\classes\autoloader as al;
use app\controllers\loginController;

al::register();
$insLogin = new loginController();

$insLogin->logoutController();