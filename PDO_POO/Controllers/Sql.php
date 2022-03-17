<?php

class Sql extends PDO {

    private $conn;

    public function __construct() {

        $this->conn = new PDO("mysql:host=localhost;dbname=treinamento1", "root", "");

    }

    //Setando para comandos mais de 1 parametro
    private function setParams($statment, $parameters = array()) {

        foreach ($parameters as $key => $value) {

            $this->setParam($statment ,$key, $value);

        }

    }

    //Setando para comandos com 1 parametro
    private function setParam($statment, $key, $value){

        $statment->bindParam($key, $value);

    }

    //Executar querys SQL
    public function execQuery($rawQuery, $params = array()) {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;

    }

    //Executar um Select
    public function select($rawQuery, $params = array()):array
    {

        $stmt = $this->execQuery($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}

?>