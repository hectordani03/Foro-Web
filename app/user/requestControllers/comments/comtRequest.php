<?php

require_once "../../../config/app.php";
require_once "../../../autoload.php";

use user\controllers\comtController;

if (isset($_POST['comt_module'])) {

	$inscomt = new comtController();

	if ($_POST['comt_module'] == "addPost") {
		echo $inscomt->addComt();
	}

	if ($_POST['comt_module'] == "updateComt") {
		echo $inscomt->updateComt();
	}

	if ($_POST['comt_module'] == "reportComt") {
		echo $inscomt->reportComt();
	}
	if ($_POST['comt_module'] == "deleteComt") {
		echo $inscomt->deleteComt();
	}
} else {
	header("Location: " . APP_URL . "user/login");
}
