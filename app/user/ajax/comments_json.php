<?php
require_once "../../config/app.php";
require_once "../../autoload.php";

use user\controllers\dataController;

$data = new dataController();

$json_users = $data->fetchData("comments");
echo $json_users; 
