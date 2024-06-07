<?php

namespace Projeto\Models\Domain;

class Musica{

    private $id;
    private $nome;
    private $produtor;

    public function __construct($id, $nome, $produtor){
        $this->setID($id);
        $this->setNome($nome);
        $this->setProdutor($produtor);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
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