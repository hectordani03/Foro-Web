<?php
require_once './autoload.php';

use app\controllers\loginController;

$insLogin = new loginController();

$insLogin->logoutController();
