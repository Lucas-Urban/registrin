<?php
session_start();
include_once("conexao.php");

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.html');
	exit();
}

$usuario = mysqli_real_escape_string($conector, $_POST["usuario"]);
$senha = md5(mysqli_real_escape_string($conector, $_POST["senha"]));

$query = "select login, senha from tb_usuario where login = '{$usuario}' and senha = '{$senha}' ";

$result = mysqli_query($conector, $query);

$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: home.php');
    exit();
}else{
    header('Location: index.html');
    exit();
}


?>
