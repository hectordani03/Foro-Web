<?php
require_once '../../../autoload.php';

use user\controllers\loginController;

$insLogin = new loginController();

$insLogin->logoutController();