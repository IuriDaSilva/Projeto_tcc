<?php

class Usuario extends Conexao

{
    public int $id;
    public array $formUsuario;
    public object $conn;
    public $msgErro = "";
    //Login
    public function login($email, $senha){

        $this->conn = $this->connect();
        $query_login = "SELECT id_usuario FROM usuarios where email = :email AND senha =: senha";
        $new_login = $this->conn->prepare($query_login);
        $new_login->execute();
       // $new_login->bindParam(':email', $this->formLogin['email']);
       // $new_login->bindParam(':senha', $this->formLogin['senha']);
        $new_login->bindValue("email", $email);
        $new_login->bindValue("senha", $senha);
        

        if($new_login->rowCount() > 0){
            $dado = $new_login->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true;
        }else{
            return false;
        }
    }


    //Listar usuarios 
    public function listar(): array {
        $this->conn = $this->connect();
        $query_usuario = "SELECT id_usuario, matricula, nome, cpf, telefone, email, endereco
                FROM usuarios
                ORDER BY id_usuario desc
                LIMIT 10";
        $busca_usuario = $this->conn->prepare($query_usuario);
        $busca_usuario->execute();
        $retorno = $busca_usuario->fetchAll();
        //var_dump($retorno);
        return $retorno;
    }

    public function visualizar(): array {
        $this->conn = $this->connect();
        $query_usuario = "SELECT id_usuario, matricula, nome, cpf, telefone, email, endereco, cargo, nome_usuario, senha
                FROM usuarios
                WHERE id_usuario =:id
                LIMIT 1";
        $vis_usuario = $this->conn->prepare($query_usuario);
        $vis_usuario->bindParam(':id', $this->id, PDO::PARAM_INT);
        $vis_usuario->execute();
        $retorno = $vis_usuario->fetch();
        return $retorno;
    }

    //Cadastrar usuarios
    public function cadastrar(): bool {
        //var_dump($this->formDados);
        $this->conn = $this->connect();

        $query_cad_usuario = "INSERT INTO usuarios
                (matricula, nome, cpf, telefone, email, endereco, cargo, nome_usuario, senha)
                VALUES (:matricula, :nome, :cpf, :telefone, :email, :endereco, :cargo, :nome_usuario, :senha)";
        
        $cad_usuario = $this->conn->prepare($query_cad_usuario);
        
        $cad_usuario->bindParam(':matricula', $this->formDados['usuario_mat']);
        $cad_usuario->bindParam(':nome', $this->formDados['usuario_nome']);
        $cad_usuario->bindParam(':cpf', $this->formDados['usuario_cpf']);
        $cad_usuario->bindParam(':telefone', $this->formDados['usuario_telefone']);
        $cad_usuario->bindParam(':email', $this->formDados['usuario_email']);
        $cad_usuario->bindParam(':endereco', $this->formDados['usuario_endereco']);
        $cad_usuario->bindParam(':cargo', $this->formDados['usuario_cargo']);
        $cad_usuario->bindParam(':nome_usuario', $this->formDados['usuario_usuario']);
        $cad_usuario->bindParam(':senha', $this->formDados['usuario_senha_1']);
       
        $cad_usuario->execute();
       // var_dump($cad_usuario);
        if($cad_usuario->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    //Editar usuarios 
    public function editar() : bool {
        $this->conn = $this->connect();
        //var_dump($this->formDados);
        $query_edit_usuario = "UPDATE usuarios
                SET matricula=:matricula, nome=:nome, cpf=:cpf, telefone=:telefone, email=:email, endereco=:endereco, cargo=:cargo, nome_usuario=:nome_usuario, senha=:senha
                WHERE id_usuario=:id";

        $edit_usuario = $this->conn->prepare($query_edit_usuario);
       
        $edit_usuario->bindParam(':matricula', $this->formDados['usuario_mat'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':nome', $this->formDados['usuario_nome'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':cpf', $this->formDados['usuario_cpf'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':telefone', $this->formDados['usuario_telefone'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':email', $this->formDados['usuario_email'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':endereco', $this->formDados['usuario_endereco'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':cargo', $this->formDados['usuario_cargo'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':nome_usuario', $this->formDados['usuario_usuario'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':senha', $this->formDados['usuario_senha_1'], PDO::PARAM_INT);
        $edit_usuario->bindParam(':id', $this->formDados['id'], PDO::PARAM_INT);

        $edit_usuario->execute();
       
        if($edit_usuario->rowCount()){
            return true;
        }else{
            return false;
        }     
    }

    //Apagar usuarios
    public function apagar(): bool {
        $this->conn = $this->connect();
        $query_conta_pg = "DELETE FROM usuarios WHERE id_usuario=:id";
        $apagar_usuario = $this->conn->prepare($query_conta_pg);
        $apagar_usuario->bindParam(':id', $this->id, PDO::PARAM_INT);
        $retorno = $apagar_usuario->execute();
        return $retorno;        
    }
     //Listar usuarios 
     public function buscar(): array {
        $this->conn = $this->connect();
        $query_usuario = "SELECT  matricula, nome, cpf, telefone, email, endereco, cargo, nome_usuario
                FROM usuarios
                WHERE matricula=:matricula
                LIMIT 1";
        $busca_usuario = $this->conn->prepare($query_usuario);
        $busca_usuario->bindParam(':matricula', $this->id, PDO::PARAM_INT);
        $busca_usuario->execute();
        $retorno = $busca_usuario->fetchAll();
        //var_dump($retorno);
        return $retorno;
    }
}



