<?php

require_once "../../../config/app.php";
require_once "../../../autoload.php";

use user\controllers\postController;

if (isset($_POST['post_module'])) {

	$inspost = new postController();

	if ($_POST['post_module'] == "addPost") {
		echo $inspost->addPost();
	}

	if ($_POST['post_module'] == "sharePost") {
		echo $inspost->sharePost("user");
	}

	if ($_POST['post_module'] == "updatePost") {
		echo $inspost->updatePost();
	}

	if ($_POST['post_module'] == "reportPost") {
		echo $inspost->reportPost();
	}
	if ($_POST['post_module'] == "deletePost") {
		echo $inspost->deletePost();
	}
} else {
	header("Location: " . APP_URL . "user/login");
}
