
<?php
require_once "../../../config/app.php";
require_once "../../../autoload.php";

use user\controllers\dataController;

$data = new dataController();

$json_data = $data->fetchJoinData("user", "reportedusers", "reports", "id_user", "id_user", "id_report", "id_report");
echo $json_data;
?>
