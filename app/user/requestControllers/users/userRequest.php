<?php

require_once "../../../config/app.php";
require_once "../../../autoload.php";

use user\controllers\userController;

if (isset($_POST['user_module'])) {

	$insUsuario = new userController();

	if ($_POST['user_module'] == "adminRegister") {
		echo $insUsuario->registerUser("admin");
	}

	if ($_POST['user_module'] == "userRegister") {
		echo $insUsuario->registerUser("user");
	}

	if ($_POST['user_module'] == "deleteUser") {
		echo $insUsuario->deleteUser();
	}

	if ($_POST['user_module'] == "updateUser") {
		echo $insUsuario->updateUser();
	}

	if ($_POST['user_module'] == "reportUser") {
		echo $insUsuario->reportUser();
	}
	if ($_POST['user_module'] == "suspendUser") {
		echo $insUsuario->suspendUser();
	}

	if ($_POST['user_module'] == "updatePhoto") {
		echo $insUsuario->updatePhoto();
	}

	if ($_POST['user_module'] == "deletePhoto") {
		echo $insUsuario->deletePhoto();
	}
} else {
	header("Location: " . APP_URL . "user/login");
}
