<?php
require_once "../../../config/app.php";
require_once "../../../autoload.php";

use user\models\mainModel;

$data = new mainModel();
session_start();

if ($_SESSION['role'] == '1' && $_SESSION['id'] == '1') {
    $json_users = $data->run_query("SELECT * FROM user WHERE id_user != {$_SESSION['id']}");
} elseif ($_SESSION['role'] == '1') {
    $json_users = $data->run_query("SELECT * FROM user WHERE id_user != {$_SESSION['id']} AND id_role != '1'");
} elseif ($_SESSION['role'] == '2') {
    $json_users = $data->run_query("SELECT * FROM user WHERE id_user != {$_SESSION['id']} AND id_role != '1' AND id_role != '2' ");
}
$results = $json_users->fetchAll(PDO::FETCH_ASSOC);

$json_data = json_encode(array('data' => $results));

echo $json_data;
