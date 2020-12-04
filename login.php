<?php
require 'classes/Conexao.php';
session_start();

 
if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: home.php');
	exit();
}
 
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
 
$query = "SELECT * FROM usuarios WHERE email = '{$email}' AND senha = '{$senha}'";
 
$result = mysqli_query($conexao, $query);
 
$row = mysqli_num_rows($result);
 var_dump($row);
if($row == 1) {
	$_SESSION['email'] = $email;
	header('Location: home.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}

?>