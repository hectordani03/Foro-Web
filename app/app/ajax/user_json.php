<?php
	require_once "../../config/app.php";
	require_once "../../autoload.php";
	
use app\controllers\dataController;
$data = new dataController();

$fields_users = array("id_user", "username", "email", "id_role", "state", "registration");
$json_users = $data->fetchData("user", $fields_users);
echo $json_users; 

?>