<?php

namespace Projeto\Models\Domain;

class Filme{

    private $nome;
    private $autor;

    public function __construct($nome, $autor){
        $this->setnome($nome);
        $this->setautor($autor);
    }

    public function getnome(){
        return $this->nome;
    }

    public function setnome($nome){
        return $this->nome = $nome;
    }

    public function getautor(){
        return $this->autor;
    }

    public function setautor($autor){
        $this->autor = $autor;
    }


}