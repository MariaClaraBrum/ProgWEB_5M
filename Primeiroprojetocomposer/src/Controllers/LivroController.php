<?php

namespace Projeto\Controllers;

use Projeto\Models\DAO\LivroDAO;
use Projeto\Models\Domain\Livro;

class LivroController{
    public function inserir($params){
        require_once("../src/Views/Livro/inserir_livro.html");
    }

    public function novo($params){
        $livro = new Livro($_POST['nome'],['escritor']);
        $livroDAO = new LivroDAO();
        if ($livroDAO->inserir($livro)){
            return "Livro inserido com sucesso!";
        }   else    {
            return "Erro ao inserir livro!";
        }
    }
}