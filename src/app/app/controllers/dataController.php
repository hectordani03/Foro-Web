<?php

namespace app\controllers;

use app\models\mainModel;
use PDO;

class dataController extends mainModel {
	
    public function fetchData($table, $fields) {
        $sql = $this->selectData("Normal", $table, "*", "");
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        $filtered_data = array();
        foreach ($data as $row) {
            $filtered_row = array();
            foreach ($fields as $field) {
                if (array_key_exists($field, $row)) {
                    $filtered_row[$field] = $row[$field];
                }
            }
            $filtered_data[] = $filtered_row;
        }
    
        return json_encode(array('data' => $filtered_data));
    }
}