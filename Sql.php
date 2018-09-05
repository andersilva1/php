<?php

class Sql extends PDO {

    private $conn;

    public function __construct(){

        $this -> conn = new PDO("mysql:host=localhost;dbname=cursophp", "root","");

    }

    private function setParams($statment, $parameters = array()){

        foreach ($parameters as $key => $value) {            
            
            $this -> setParam($statment, $key, $value);
        }

    }

    private function setParam($statment, $key, $value){

        $statment -> bindParam($key, $value);
    }

    public function query($rawQuery, $paramns = array()){

        $stmt = $this -> conn -> prepare($rawQuery);

        $this -> setParams($stmt, $paramns);

        $stmt -> execute();

        return $stmt;

    }

    public function select($rawQuery, $paramns = array()):array{

        $stmt = $this -> query($rawQuery, $paramns);

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
}

?>