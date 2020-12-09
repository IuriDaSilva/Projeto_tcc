<?php
session_start();

ob_start();

//Receber o ID da URL
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//Verificar se o id possui valor
if(!empty($id)){
    //Incluir arquivos
    require '../classes/Conexao.php';
	require '../classes/Sala.php';
    
    //Instanciar a classe e criar o bojeto
    $apagarContaPg= new Sala();
    
    //Enviar o ID para o atributo da classe ContasPagar
    $apagarContaPg->id = $id;
    
    //Instanciar o método apagar
    $valor = $apagarContaPg->apagar();
    
    if($valor){
        echo "<div class='alert alert-danger' role='alert'>Sala apagada!</div>";
        //$_SESSION['msg'] = "<p style='color: green;'>Conta a pagar apagada com sucesso!</p>";
        header("Location: sala-list.php");
    }else{
        echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
        $_SESSION['msg'] =  "<p style='color: #ff0000;'>Erro: Sala não apagada!</p>";
        header("Location: sala-list.php");
    }
    
}else{
    $_SESSION['msg'] =  "<p style='color: #ff0000;'>Erro: Sala não encontrada!</p>";
    header("Location: sala-list.php");
}