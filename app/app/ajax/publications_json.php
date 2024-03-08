
<?php
	require_once "../../config/app.php";
	require_once "../../autoload.php";
	
use app\controllers\dataController;
$data = new dataController();

$json_data = $data->fetchJoinData("publications", "interactions", "entity_type", "entity_type");
echo $json_data;

?>
