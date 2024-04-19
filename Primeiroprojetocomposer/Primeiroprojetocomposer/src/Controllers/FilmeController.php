<?php

namespace Projeto\Controllers;

use Projeto\Models\DAO\FilmeDAO;
use Projeto\Models\Domain\Filme;

class FilmeController{
    public function inserir($params){
        require_once("../src/Views/filme/inserir_filme.html");
    }

    public function novo($params){
        $filme = new Filme($_POST['nome'],['autor']);
        $filmeDAO = new FilmeDAO();
        if ($filmeDAO->inserir($filme)){
            return "Filme inserido com sucesso!";
        }   else    {
            return "Erro ao inserir filme!";
        }
    }
}