<?php

namespace Projeto\Models\DAO;

use Projeto\Models\Domain\Musica;

class MusicaDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Musica $musica){
        try{
            $sql = "INSERT INTO musica (id, nome, produtor) VALUES (:id, :nome, :produtor)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $musica->getID());
            $p->bindValue(":nome", $musica->getNome());
            $p->bindValue(":produtor", $musica->getProdutor());
            return $p->execute();
        } catch(\Exception $e){
            echo $e;
        }        
    }

    public function alterar(Musica $musica){
        try{
            $sql = "UPDATE musica SET nome = :nome, produtor = :produtor
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $musica->getNome());
            $p->bindValue(":produtor", $musica->getProdutor());
            $p->bindValue(":id", $musica->getId());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM musica WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM musica";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM musica WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

}
    