<?php

namespace Projeto\Controllers;

use Projeto\Models\DAO\SerieDAO;
use Projeto\Models\Domain\Serie;

class SerieController{
    public function inserir($params){
        require_once("../src/Views/Serie/inserir_Serie.html");
    }

    public function novo($params){
        $serie = new Serie(0, $_POST['nome'],['criador']);
        $serieDAO = new SerieDAO();
        if ($serieDAO->inserir($serie)){
            return "Série inserida com sucesso!";
        }   else    {
            return "Erro ao inserir série!";
        }
    }
}