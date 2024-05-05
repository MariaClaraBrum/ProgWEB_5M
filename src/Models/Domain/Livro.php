<?php

namespace Projeto\Models\Domain;

class Livro{

    private $nome;
    private $escritor;

    public function __construct($nome, $escritor){
        $this->setNome($nome);
        $this->setEscritor($escritor);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        return $this->nome = $nome;
    }

    public function getEscritor(){
        return $this->escritor;
    }

    public function setEscritor($escritor){
        $this->escritor = $escritor;
    }

}