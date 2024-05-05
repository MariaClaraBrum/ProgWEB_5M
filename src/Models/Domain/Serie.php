<?php

namespace Projeto\Models\Domain;

class Serie{

    private $nome;
    private $criador;

    public function __construct($nome, $criador){
        $this->setNome($nome);
        $this->setCriador($criador);
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