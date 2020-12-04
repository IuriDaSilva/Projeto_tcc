<?php

    class Sala extends Conexao{

        public int $id;
        public array $formSalas;
        public object $conn;

    //Listar Salas 
    public function listar(): array {
        $this->conn = $this->connect();
        $query_sala = "SELECT id_sala, codigo, nome, tipo, descricao 
                FROM salas
                ORDER BY id_sala DESC
                LIMIT 5";
        $result_sala = $this->conn->prepare($query_sala);
        $result_sala->execute();
        $retorno = $result_sala->fetchAll();
        //var_dump($retorno);
        return $retorno;
    }
    public function visualizar(): array {
        $this->conn = $this->connect();
        $query_sala = "SELECT id_sala, codigo, nome, tipo, descricao
                FROM salas
                WHERE id_sala =:id
                LIMIT 1";
        $result_sala = $this->conn->prepare($query_sala);
        $result_sala->bindParam(':id', $this->id, PDO::PARAM_INT);
        $result_sala->execute();
        $retorno = $result_sala->fetch();
        return $retorno;
    }


        //Cadastrar salas
            public function cadastrar(): bool {
                var_dump($this->formDados);
                $this->conn = $this->connect();

                $query_cad_salas = "INSERT INTO salas
                        (codigo, nome, tipo, descricao)
                        VALUES (:codigo, :nome, :tipo, :descricao)";
                
                $cad_sala = $this->conn->prepare($query_cad_salas);
                
                $cad_sala->bindParam(':codigo', $this->formDados['sala_codigo']);
                $cad_sala->bindParam(':nome', $this->formDados['sala_nome']);
                $cad_sala->bindParam(':tipo', $this->formDados['sala_tipo']);
                $cad_sala->bindParam(':descricao', $this->formDados['sala_descricao']);
            
            
                $cad_sala->execute();
                var_dump($cad_sala);
                if($cad_sala->rowCount()){
                    return true;
                }else{
                    return false;
                }
            }
            
    //Editar usuarios 
    public function editar() : bool {
        $this->conn = $this->connect();
        //var_dump($this->formDados);
        $query_edit_sala = "UPDATE salas
                SET codigo=:codigo, nome=:nome, tipo=:tipo, descricao=:descricao
                WHERE id_sala=:id";

        $edit_sala = $this->conn->prepare($query_edit_sala);
       
        $edit_sala->bindParam(':codigo', $this->formDados['sala_codigo'], PDO::PARAM_INT);
        $edit_sala->bindParam(':nome', $this->formDados['sala_nome'], PDO::PARAM_STR);
        $edit_sala->bindParam(':tipo', $this->formDados['sala_tipo'], PDO::PARAM_STR);
        $edit_sala->bindParam(':descricao', $this->formDados['sal_desc'], PDO::PARAM_STR);
        $edit_sala->bindParam(':id', $this->formDados['id'], PDO::PARAM_INT);

        $edit_sala->execute();
       
        if($edit_sala->rowCount()){
            return true;
        }else{
            return false;
        }     
    }
    //Apagar usuarios
    public function apagar(): bool {
        $this->conn = $this->connect();
        $query_conta_pg = "DELETE FROM salas WHERE id_sala=:id";
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
?>