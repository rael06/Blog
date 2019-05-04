<?php
namespace App;

use \PDO;

class Database {
    private $db_name = "";
    private $db_user = "";
    private $db_pass = "";
    private $db_host = "";
    private $pdo;

    public function __construct($db_host, $db_name, $db_user, $db_pass) {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO() {
        $connectData = "'mysql:host=localhost;dbname=blog', 'root', ''";
        var_dump($connectData);
        $pdo = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . '', $this->db_user, $this->db_pass);
        var_dump($pdo);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
        return $pdo;
    }

    public function query($queryStr) {
        $req = $this->getPDO()->query($queryStr);
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }

}
?>