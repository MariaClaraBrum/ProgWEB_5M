<?php

namespace Projeto\Models\DAO;

use Projeto\Models\Domain\musica;

class MusicaDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Musica $musica){
        try{
            $sql = "INSERT INTO musica (nome) VALUES (:nome)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $musica->getNome());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }       
        try{
            $sql = "INSERT INTO musica (produtor) VALUES (:produtor)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":produtor", $musica->getProdutor());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }    
    }
}