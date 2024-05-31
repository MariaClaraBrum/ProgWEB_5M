<?php

namespace Projeto\Models\Domain;

class Serie{

    private $id;
    private $nome;
    private $criador;

    public function __construct($id, $nome, $criador){
        $this->setId($id);
        $this->setNome($nome);
        $this->setCriador($criador);
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

    public function getCriador(){
        return $this->criador;
    }

    public function setCriador($criador){
        $this->criador = $criador;
    }


}