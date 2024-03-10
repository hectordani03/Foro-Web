<?php
require_once "../../config/app.php";
require_once "../../autoload.php";

use user\controllers\dataController;

$data = new dataController();

$fields_users = array("id_post", "id_user", "content", "category", "state", "img");
$json_users = $data->fetchData("posts", $fields_users);
echo $json_users;
