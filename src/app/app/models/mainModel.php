<?php

    namespace app\models;

    use \PDO;

    if (file_exists(__DIR__ . "/../../config/server.php")) {
        require_once '/../../config/server.php';
    }

class mainModel
{
    private $server = DB_SERVER;
    private $db = DB_NAME;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;

    protected function connect()
    {
        $conne = new PDO("mysql:host=" . $this->server . ";dbname=" . $this->db, $this->db_user, $this->db_pass);
        $conne->exec("SET CHARACTER SET utf8");
        return $conne;
    }
    protected function run_query($query)
    {
        $sql = $this->connect()->prepare($query);
        $sql->execute();
        return $sql;
    }
}
