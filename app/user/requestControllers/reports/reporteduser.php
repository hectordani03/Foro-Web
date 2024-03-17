
<?php
require_once "../../../config/app.php";
require_once "../../../autoload.php";

use user\models\mainModel;

$data = new mainModel();

$json_users = $data->run_query("SELECT *
FROM user
INNER JOIN reportedusers ON user.id_user = reportedusers.id_user
INNER JOIN reports ON reports.id_report = reportedusers.id_report
LEFT JOIN suspendedusers ON suspendedusers.id_suspended_user = user.id_user
GROUP BY reportedusers.id_report;
");

$results = $json_users->fetchAll(PDO::FETCH_ASSOC);

$json_data = json_encode(array('data' => $results));

echo $json_data;

?>
