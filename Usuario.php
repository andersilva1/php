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

            $this -> setData($result[0]);
        }
    }

    public static function getList(){

        $sql = new Sql();

        return $sql -> select("SELECT * FROM usuario ORDER BY login;");
    }

    public static function search($login){

        $sql = new Sql();

        return $sql -> select("SELECT * FROM usuario WHERE login LIKE :SEARCH ORDER BY login", array(
            ':SEARCH' => "%" . $login . "%"
        ));

    }

    public function login($login, $password){

        $sql = new Sql();

        $result = $sql -> select("SELECT * FROM usuario WHERE login = :LOGIN AND senha = :PASSWORD", array(
            ":LOGIN" => $login,
            ":PASSWORD" => $password

        ));

        if (count($result) > 0){

            $this -> setData($result[0]);

        } else {
            throw new Exception("Login e/ou senha invalidados");
        
        }

    }

    public function setData($data){

        $this -> setId($data['id']);
        $this -> setLogin($data['login']);
        $this -> setSenha($data['senha']);
        $this -> setDtCadastro($data['dt_cadastro']);

    }

    public function insert(){

        $sql = new Sql();

        $result = $sql -> select("CALL usuario_insert(:LOGIN, :PASSWORD)", array(
            ':LOGIN' => $this -> getLogin(),
            ':PASSWORD' => $this -> getSenha()
        ));

        if (count($result) > 0) {
            $this -> setData($result[0]);
        }
    }

    public function __construct($login = "", $password = ""){

        $this -> setLogin($login);
        $this -> setSenha($password);
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