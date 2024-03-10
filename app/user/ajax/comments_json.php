<?php
require_once "../../config/app.php";
require_once "../../autoload.php";

use user\controllers\dataController;

$data = new dataController();

$fields_users = array("id_comment", "id_user", "id_post", "content", "date");
$json_users = $data->fetchData("comments", $fields_users);
echo $json_users;
