<?php

namespace Projeto\Models\DAO;

use Projeto\Models\Domain\Livro;

class LivroDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Livro $livro){
        try{
            $sql = "INSERT INTO livro (id, nome, escritor) VALUES (:id, :nome, :escritor)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $livro->getID());
            $p->bindValue(":nome", $livro->getNome());
            $p->bindValue(":escritor", $livro->getEscritor());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }        
    }

    public function alterar(Livro $livro){
        try{
            $sql = "UPDATE livro SET nome = :nome, escritor = :escritor
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $livro->getNome());
            $p->bindValue(":escritor", $livro->getEscritor());
            $p->bindValue(":id", $livro->getId());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM livro WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM livro";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM livro WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

}
    