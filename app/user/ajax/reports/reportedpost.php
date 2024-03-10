
<?php
require_once "../../../config/app.php";
require_once "../../../autoload.php";

use user\controllers\dataController;

$data = new dataController();

$json_data = $data->fetchJoinData("posts", "reportedposts", "id_post", "id_post", "reports", "id_report", "id_report");
echo $json_data;

?>
