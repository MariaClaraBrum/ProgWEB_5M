<?php

namespace Projeto\Models\Domain;

class Livro{

    private $id;
    private $nome;
    private $escritor;

    public function __construct($id, $nome, $escritor){
        $this->setId($id);
        $this->setNome($nome);
        $this->setEscritor($escritor);
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

    public function getEscritor(){
        return $this->escritor;
    }

    public function setEscritor($escritor){
        $this->escritor = $escritor;
    }

}