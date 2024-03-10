<?php

namespace user\controllers;

use user\models\mainModel;
use PDO;

class dataController extends mainModel {
	
    public function fetchData($table, $fields) {
        $sql = $this->selectData("Normal", $table);
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


    public function fetchjoinData($table, $jointable, $field, $field2, $jointable2, $field3, $field4) {
        $firstable= "$table.*";
        $secondtable = "$jointable.*";
        $thirdtable = "$jointable2.*";
        $sql = $this->selectData("Join", $table, "$firstable, $secondtable, $thirdtable", "$jointable", "$jointable.$field2 = $table.$field", "$jointable2", "$jointable.$field4 = $jointable2.$field3");
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        return json_encode(array('data' => $data));
        
    }

}