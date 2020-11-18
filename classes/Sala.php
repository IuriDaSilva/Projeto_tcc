<?php

    class Sala extends Conexao{

        public int $id;
        public array $formSalas;
        public object $conn;

    //Listar Salas 
    public function listar(): array {
        $this->conn = $this->connect();
        $query_sala = "SELECT id, codigo, nome, tipo, decricao 
                FROM salas
                ORDER BY id DESC
                LIMIT 5";
        $result_sala = $this->conn->prepare($query_sala);
        $result_sala->execute();
        $retorno = $result_sala->fetchAll();
        //var_dump($retorno);
        return $retorno;
    }
    public function visualizar(): array {
        $this->conn = $this->connect();
        $query_sala = "SELECT id, codigo, nome, tipo, decricao
                FROM salas
                WHERE id =:id
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
                        (codigo, nome, tipo, decricao)
                        VALUES (:codigo, :nome, :tipo, :decricao)";
                
                $cad_sala = $this->conn->prepare($query_cad_salas);
                
                $cad_sala->bindParam(':codigo', $this->formDados['sala_codigo']);
                $cad_sala->bindParam(':nome', $this->formDados['sala_nome']);
                $cad_sala->bindParam(':tipo', $this->formDados['sala_tipo']);
                $cad_sala->bindParam(':decricao', $this->formDados['sala_descricao']);
            
            
                $cad_sala->execute();
                
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
                SET codigo=:codigo, nome=:nome, tipo=:tipo, decricao=:decricao
                WHERE id=:id";

        $edit_sala = $this->conn->prepare($query_edit_sala);
       
        $edit_sala->bindParam(':codigo', $this->formDados['sala_codigo'], PDO::PARAM_INT);
        $edit_sala->bindParam(':nome', $this->formDados['sala_nome'], PDO::PARAM_STR);
        $edit_sala->bindParam(':tipo', $this->formDados['sala_tipo'], PDO::PARAM_STR);
        $edit_sala->bindParam(':decricao', $this->formDados['sal_desc'], PDO::PARAM_STR);
        $edit_sala->bindParam(':id', $this->formDados['id'], PDO::PARAM_INT);

        $edit_sala->execute();
       
        if($edit_sala->rowCount()){
            return true;
        }else{
            return false;
        }     
    }

    }
?>