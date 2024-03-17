
<?php
require_once "../../../config/app.php";
require_once "../../../autoload.php";

use user\controllers\dataController;

$data = new dataController();

$json_data = $data->fetchJoinData("comments", "reportedcomments", "reports", "id_comment", "id_comment", "id_report", "id_report");
echo $json_data;

?>
