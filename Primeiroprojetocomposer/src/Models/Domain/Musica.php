<?php

namespace Filme\Models\Domain;

class Musica{

    private $nome;
    private $produtor;

    public function __construct($nome, $produtor){
        $this->setNome($nome);
        $this->setProdutor($produtor);
    }

    public function getNome(){
        return $this->sabor;
    }

    public function setNome($nome){
        return $this->nome = $nome;
    }

    public function getProdutor(){
        return $this->produtor;
    }

    public function setProdutor($produtor){
        $this->produtor = $produtor;
    }

}