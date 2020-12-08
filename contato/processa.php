<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$nome = $_POST['msg-nome'];
        $email = $_POST['msg-email'];
        $telefone = $_POST['msg-telefone'];
        $descricao = $_POST['msg-desc'];
		$mensagem = $_POST['mensagem'];
        
        mail('To: iuri481@gmail.com', $nome, $email, $telefone, $descricao, $mensagem,'From: iurisilnas@gmail.com');
        echo "Dados enviados com sucesso";
        /*require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "iuri481@gmail.com");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "iurisilnas@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá Cesar, <br><br>Nova mensagem de contato<br><br>Nome: $nome<br>Email: $email <br>Telefone: $telefone<br>Descrição: $descricao <br>Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = 'SENDGRID_API_KEY';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";*/
		
        ?>
    </body>
</html>
