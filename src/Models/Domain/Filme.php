<?php

namespace Projeto\Models\Domain;

class Filme{
    
    private $id;
    private $nome;
    private $autor;

    public function __construct($id, $nome, $autor){
        $this->setId($id);
        $this->setNome($nome);
        $this->setAutor($autor);
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

    public function getAutor(){
        return $this->autor;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

}