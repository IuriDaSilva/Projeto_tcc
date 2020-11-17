<?php
session_start();
include_once("Conexao.php");

$matricula = filter_input(INPUT_POST , 'usuario_mat', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'usuario_nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'usuario_email', FILTER_SANITIZE_EMAIL);
$cpf = filter_input(INPUT_POST, 'usuario_cpf', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'usuario_telefone', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'usuario_endereco', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario_usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'usuario_senha_1', FILTER_SANITIZE_STRING);
$cargo = filter_input(INPUT_POST, 'usuario_cargo', FILTER_SANITIZE_STRING);

			/*echo "Matricula: $matricula <br>";
			echo "Nome: $nome <br>";
			echo "E-mail: $email <br>";
			echo "CPF: $cpf <br>";
			echo "Telefone: $telefone <br>";
			echo "Endereco: $endereco <br>";
			echo "Usuário: $usuario <br>";
			echo "Senha: $senha <br>";
			if($cargo == 1){
			echo "Cargo: Coordenador <br>"; 
			}else{
			echo "Cargo: Professor <br>";
			}*/

$result_usuario = "INSERT INTO usuario (matricula, nome, cpf, telefone, endereco, email, nome_usuario, senha) VALUES ('$matricula', '$nome', '$cpf', '$telefone', '$endereco', '$email', '$usuario', '$senha')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("./user/user_new.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("./user/user_new.php");
}