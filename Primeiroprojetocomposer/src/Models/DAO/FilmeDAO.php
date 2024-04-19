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
            $sql = "INSERT INTO filme (nome, autor) VALUES (:nome, :autor)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $filme->getNome());
            $p->bindValue(":autor", $filme->getAutor());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }        
    }
}