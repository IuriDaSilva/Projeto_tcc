<?php
session_start();

ob_start();

//Receber o ID da URL
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//Verificar se o id possui valor
if(!empty($id)){
    //Incluir arquivos
    require '../classes/Conexao.php';
	require '../classes/Usuario.php';
    
    //Instanciar a classe e criar o bojeto
    $apagarContaPg= new Usuario();
    
    //Enviar o ID para o atributo da classe ContasPagar
    $apagarContaPg->id = $id;
    
    //Instanciar o método apagar
    $valor = $apagarContaPg->apagar();
    
    if($valor){
        $_SESSION['msg'] = "<p style='color: green;'>Conta a pagar apagada com sucesso!</p>";
        header("Location: user-list.php");
    }else{
        $_SESSION['msg'] =  "<p style='color: #ff0000;'>Erro: Conta a pagar não apagada!</p>";
        header("Location: user-list.php");
    }
    
}else{
    $_SESSION['msg'] =  "<p style='color: #ff0000;'>Erro: Conta a pagar não encontrada!</p>";
    header("Location: user-list.php");
}