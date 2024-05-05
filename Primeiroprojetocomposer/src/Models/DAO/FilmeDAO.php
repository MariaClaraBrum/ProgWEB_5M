<?php

namespace Projeto\Models\DAO;

use Projeto\Models\Domain\Filme;

class FilmeDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Filme $filme){
        try{
            $sql = "INSERT INTO filme (id, nome, autor) VALUES (:id, :nome, :autor)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $filme->getID());
            $p->bindValue(":nome", $filme->getNome());
            $p->bindValue(":autor", $filme->getAutor());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }        
    }

    public function alterar(Filme $filme){
        try{
            $sql = "UPDATE filme SET nome = :nome, autor = :autor
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $filme->getNome());
            $p->bindValue(":autor", $filme->getAutor());
            $p->bindValue(":id", $filme->getId());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM filme WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM filme";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM filme WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

}
    