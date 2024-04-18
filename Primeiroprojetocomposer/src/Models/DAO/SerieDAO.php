<?php

namespace Filme\Models\DAO;

use Filme\Models\Domain\Serie;

class SerieDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Serie $serie){
        try{
            $sql = "INSERT INTO serie (nome, criador) VALUES (:nome, :criador)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $serie->getNome());
            $p->bindValue(":criador", $serie->getCriador());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }            
    }
}