<?php

namespace Projeto\Models\DAO;

use Projeto\Models\Domain\Serie;

class SerieDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Serie $Serie){
        try{
            $sql = "INSERT INTO serie (id, nome, criador) VALUES (:id, :nome, :criador)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $Serie->getID());
            $p->bindValue(":nome", $Serie->getNome());
            $p->bindValue(":criador", $Serie->getcriador());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }        
    }

    public function alterar(Serie $Serie){
        try{
            $sql = "UPDATE serie SET nome = :nome, criador = :criador
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $Serie->getNome());
            $p->bindValue(":criador", $Serie->getcriador());
            $p->bindValue(":id", $Serie->getId());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM serie WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM serie";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM serie WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

}
    