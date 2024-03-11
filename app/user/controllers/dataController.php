<?php

namespace user\controllers;

use user\models\mainModel;
use PDO;

class dataController extends mainModel
{

    public function fetchData($table)
    {
        $sql = $this->selectData("normal", $table, "*");
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('data' => $data));
    }

    public function fetchjoinData($table, $table2, $table3, $field, $field2, $field3, $field4)
    {
        $sql = $this->run_query("SELECT * FROM $table INNER JOIN $table2 ON $table.$field = $table2.$field2 INNER JOIN $table3 ON $table3.$field3 = $table2.$field4");
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('data' => $data));
    }
}
