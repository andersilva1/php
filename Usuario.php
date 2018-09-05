<?php

class Usuario {

    private $id;
    private $login;
    private $senha;
    private $dtCadastro;

    public function getId(){
        return $this -> id;
    }

    public function setId($id){
        return $this -> id = $id;
    }

    public function getLogin(){
        return $this -> login;
    }

    public function setLogin($login){
        return $this -> login = $login;
    }
    
    public function getSenha(){
        return $this -> senha;
    }

    public function setSenha($senha){
        return $this -> senha = $senha;
    }

    public function getDtCadastro(){
        return $this -> dtCadastro;
    }

    public function setDtCadastro($dtCadastro){
        return $this -> dtCadastro = $dtCadastro;
    }

    public function loadByID($id){

        $sql = new Sql();

        $result = $sql -> select("SELECT * FROM usuario WHERE id = :ID", array(
            ":ID" => $id

        ));

        if (count($result) > 0){

            $row = $result[0];

            $this -> setId($row['id']);
            $this -> setLogin($row['login']);
            $this -> setSenha($row['senha']);
            $this -> setDtCadastro($row['dt_cadastro']);
        }
    }

    public function __toString(){
        return json_encode(array(
            "id" => $this -> getId(),
            "login" => $this -> getLogin(),
            "senha" => $this -> getSenha(),
            "dtcadastro" => $this -> getDtCadastro()
        ));
    }

}

?>