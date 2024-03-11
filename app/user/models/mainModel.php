<?php

namespace user\models;

use \PDO;

if (file_exists(__DIR__ . "/../../config/server.php")) {
    require_once __DIR__ . "/../../config/server.php";
}

class mainModel
{

    private $server = DB_SERVER;
    private $db = DB_NAME;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;

    protected function connect() {

        $conne = new PDO("mysql:host=" . $this->server . ";dbname=" . $this->db, $this->db_user, $this->db_pass);
        $conne->exec("SET CHARACTER SET utf8");

        return $conne;
    }

    public function run_query($query) {

        $sql = $this->connect()->prepare($query);
        $sql->execute();

        return $sql;
    }

    public function sanitizeString($string) {

        $strs = ["<script>", "</script>", "<script src", "<script type=", "SELECT * FROM", "SELECT ", " SELECT ", "DELETE FROM", "INSERT INTO", "DROP TABLE", "DROP DATABASE", "TRUNCATE TABLE", "SHOW TABLES", "SHOW DATABASES", "<?php", "?>", "--", "^", "<", ">", "==", "=", ";", "::"];

        $string = trim($string);
        $string = stripslashes($string);

        foreach ($strs as $str) {

            $string = str_ireplace($str, "", $string);
        }

        $string = trim($string);
        $string = stripslashes($string);

        return $string;
    }

    protected function verifyData($filter, $string) {

        if (preg_match("/^" . $filter . "$/", $string)) {

            return false;
        } else {

            return true;
        }
    }

    protected function insertData($table, $field) {

        $query = "INSERT INTO $table (";
        $counter = 0;
        foreach ($field as $row) {

            if ($counter >= 1) {
                $query .= ",";
            }
            $query .= $row["table_field"];
            $counter++;
        }

        $query .= ") VALUES(";

        $counter = 0;
        foreach ($field as $row) {

            if ($counter >= 1) {
                $query .= ",";
            }
            $query .= $row["param"];
            $counter++;
        }

        $query .= ")";

        $sql = $this->connect()->prepare($query);
        foreach ($field as $row) {

            $sql->bindParam($row["param"], $row["field_value"]);
        }

        $sql->execute();

        return $sql;
    }

    public function selectData($type, $table, $field, $id = "") {
        $type=$this->sanitizeString($type);
        $table=$this->sanitizeString($table);
        $field=$this->sanitizeString($field);
        $id=$this->sanitizeString($id);

        if($type=="unique"){
            $sql=$this->connect()->prepare("SELECT * FROM $table WHERE $field=:id");
            $sql->bindParam(":id",$id);
        }elseif($type=="normal"){
            $sql=$this->connect()->prepare("SELECT $field FROM $table");
        }
        $sql->execute();

        return $sql;
    }

    protected function updateData($table, $data, $cond) {

        $query = "UPDATE $table SET ";

        $counter = 0;
        foreach ($data as $row) {
            if ($counter >= 1) {
                $query .= ",";
            }
            $query .= $row["table_field"] . "=" . $row["param"];
            $counter++;
        }

        $query .= " WHERE " . $cond["field_cond"] . "=" . $cond["param_cond"];

        $sql = $this->connect()->prepare($query);

        foreach ($data as $row) {
            $sql->bindParam($row["param"], $row["field_value"]);
        }

        $sql->bindParam($cond["param_cond"], $cond["cond_value"]);
        
        $sql->execute();

        return $sql; 
    }

    protected function deleteData($table, $field, $id) {

        $sql = $this->connect()->prepare("DELETE FROM $table WHERE $field=:id");
        $sql->bindParam(":id", $id);
        $sql->execute();

        return $sql;
    }
}
