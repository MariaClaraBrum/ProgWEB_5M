<?php

namespace Filme\Controllers;
namespace Serie\Controllers;
namespace Musica\Controllers;
namespace Livro\Controllers;

class HomeController{

    public function olaMundo($params){
        return "Olá Mundo!";
    }

    public function InsertSerie($params){
        require_once("../src/views/Serie/inserir_serie.html");
    }
    public function InsertFilme($params){
        require_once("../src/views/Filme/inserir_filme.html");
    }
    public function InsertLivro($params){
        require_once("../src/views/Livro/inserir_livro.html");
    }
    public function InsertMusica($params){
        require_once("../src/views/Musica/inserir_musica.html");
    }

}