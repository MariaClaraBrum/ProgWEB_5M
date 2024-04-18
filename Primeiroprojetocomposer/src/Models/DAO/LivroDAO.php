<?php

namespace Filme\Models\DAO;

use Filme\Models\Domain\Livros;

class LivroDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Livro $livro){
        try{
            $sql = "INSERT INTO livro (nome) VALUES (:nome)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $livros->getNome());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
        try{
            $sql = "INSERT INTO livro (autor) VALUES (:autor)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":autor", $livros->getAutor());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }          
    }
}