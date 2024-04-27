<?php

namespace app\classes;

use \mysqli;

class DB
{

    private $host;
    private $db;
    private $db_user;
    private $db_pass;

    public $cone;
    public $s = " * ";
    public $w = " 1 ";

    public function __construct($dbh = DB_HOST, $dbn = DB_NAME, $dbu = DB_USER, $dbp = DB_PASS)
    {
        $this->host = $dbh;
        $this->db = $dbn;
        $this->db_user = $dbu;
        $this->db_pass = $dbp;
    }

    public function connect()
    {
        $this->cone = new mysqli($this->host, $this->db_user, $this->db_pass, $this->db);
        if ($this->cone->connect_errno) {
            echo "Error al conectar db" . $this->cone->connect_errno;
            return;
        }
        $this->cone->set_charset("utf8");
        return $this->cone;
    }

    public function get()
    {
        $sql = "SELECT" . $this->s . "FROM " . str_replace("app\\models\\", "", get_class(($this)) . " WHERE" . $this->w);
        // echo $sql; die();
        $r = $this->connect()->query($sql);
        while ($f = $r->fetch_assoc()) {
            $result[] = $f;
        }
        return json_encode($result);
    }

    public function all()
    {
        return $this;
    }
}
