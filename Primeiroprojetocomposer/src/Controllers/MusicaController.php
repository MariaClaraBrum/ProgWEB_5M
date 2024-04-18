<?php

namespace Filme\Controllers;

use Filme\Models\DAO\MusicaDAO;
use Filme\Models\Domain\Musica;

class MusicaController{
    public function inserir($params){
        require_once("../src/Views/Musica/inserir_musica.html");
    }

    public function novo($params){
        $musica = new Musica(0, $_POST['nome'],['produtor']);
        $musicaDAO = new MusicaDAO();
        if ($musicaDAO->inserir($musica)){
            return "Música inserida com sucesso!";
        }   else    {
            return "Erro ao inserir música!";
        }
    }
}