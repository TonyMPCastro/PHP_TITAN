<?php

namespace App\Models;

use PDO;

class Produtos extends Conn
{
    private $resultadoBd;
    private object $conn;
    private $dados;


    public function get_prod() {
        $this->conn = $this->connect();
        $query_val = "SELECT * FROM produtos";
        $result_val = $this->conn->prepare($query_val);
        $result_val->execute();
        $this->resultadoBd = $result_val->fetchAll();
        if ($this->resultadoBd) {
          return $this->resultadoBd;
        }else{
            return $this->resultadoBd;
        }
    }

    public function get_cor() {
        $this->conn = $this->connect();
        $query_val = "SELECT cor FROM produtos GROUP BY cor";
        $result_val = $this->conn->prepare($query_val);
        $result_val->execute();
        $this->resultadoBd = $result_val->fetchAll();
        if ($this->resultadoBd) {
          return $this->resultadoBd;
        }else{
            return $this->resultadoBd;
        }
    }

    public function insertProduto(array $dados = null) {
        $this->dados = $dados;
        $this->conn = $this->connect();
    
         $query_val = $this->conn->prepare('INSERT INTO produtos (nome,cor,preco) VALUES (:nome,:cor,:precoP)');
        $query_val->bindParam(":nome", $this->dados['produto'], PDO::PARAM_STR);
        $query_val->bindParam(":cor", $this->dados['cor'], PDO::PARAM_STR);
        $query_val->bindParam(":precoP", $this->dados['precoP'], PDO::PARAM_STR);              
        $query_val->execute();
     
        }

        public function updateProduto(array $dados = null) {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = $this->conn->prepare('UPDATE produtos SET nome = :nome, preco = :precoP WHERE idProduto = :id');
            $query_val->bindParam(":id", $this->dados['idP'], PDO::PARAM_STR);
            $query_val->bindParam(":nome", $this->dados['produto'], PDO::PARAM_STR);    
            $query_val->bindParam(":precoP", $this->dados['precoP'], PDO::PARAM_STR);              
            $query_val->execute();
        }

            public function selectProduto(array $dados = null) {
                $this->dados = $dados;
                $this->conn = $this->connect();
                $query_val = "SELECT * FROM produtos WHERE idProduto = :id";
                $result_val = $this->conn->prepare($query_val);
                $result_val->bindParam(":id", $this->dados['id'], PDO::PARAM_STR);
                $result_val->execute();
                $this->resultadoBd = $result_val->fetch();
                if ($this->resultadoBd) {
                  return $this->resultadoBd;
                }else{
                    return $this->resultadoBd;
                }
             }

        public function deleteProduto(array $dados = null) {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = $this->conn->prepare('DELETE FROM produtos WHERE idProduto = :id');
            $query_val->bindParam(":id", $this->dados['id'], PDO::PARAM_STR);
            $query_val->execute();
         }
}


