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
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . '', $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function db_query($queryStr, $class_name) {
        $req = $this->getPDO()->query($queryStr);
        $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
        return $datas;
    }

    public function db_prepare($queryStr, $param, $class_name, $oneResult = false) {
        $reqPrepared = $this->getPDO()->prepare($queryStr);
        $reqPrepared->execute($param);
        $reqPrepared->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if ($oneResult) {
            $datas = $reqPrepared->fetch();
        } else {
            $datas = $reqPrepared->fetchAll();
        }
        return $datas;
    }

}
?>