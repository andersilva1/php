<?php

require_once("config.php");

//Carrega apenas um usuário
/*$sql = new Sql();
$usuario = $sql -> select("SELECT * FROM usuario");
echo json_encode($usuario);
$root = new Usuario();
$root -> loadByID(3);
echo $root;*/

//Carrega uma lista de usuários
/*$lista = Usuario::getList();
echo json_encode($lista);*/

//Carrega uma lista de usuários buscando pelo login
/*$busca = Usuario::search("ar");
echo json_encode($busca);*/

//Carrega um usuário usando login e senha
$usuario = new Usuario();
$usuario -> login ("root", "!@W#wsxew43");

echo $usuario;

?>