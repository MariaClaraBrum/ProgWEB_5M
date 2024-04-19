<?php

namespace Projeto\Models\Domain;

class Livro{

    private $nome;
    private $autor;

    public function __construct($nome, $autor){
        $this->setNome($nome);
        $this->setAutor($autor);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        return $this->nome = $nome;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

}