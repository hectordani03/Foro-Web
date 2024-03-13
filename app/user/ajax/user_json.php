<?php
require_once "../../config/app.php";
require_once "../../autoload.php";

use user\models\mainModel;

$data = new mainModel();

$json_users = $data->selectData("unique", "user", "state", "1", "state");
$results = $json_users->fetchAll(PDO::FETCH_ASSOC);

$json_data = json_encode(array('data' => $results));

echo $json_data;

