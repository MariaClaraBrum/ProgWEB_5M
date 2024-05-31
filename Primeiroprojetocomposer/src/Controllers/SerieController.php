<?php

namespace Projeto\Controllers;

use Projeto\Models\DAO\SerieDAO;
use Projeto\Models\Domain\Serie;

class SerieController{
    public function inserir_serie($params){
        require_once("../src/Views/Serie/inserir_serie.html");
    }

    public function index($params){
        $SerieDAO = new SerieDAO();
        $resultado = $SerieDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true")
            $mensagem = "Registro inserido com sucesso!";
        elseif($acao == "inserir" && $status == "false")
            $mensagem = "Erro ao inserir!";
        elseif($acao == "alterar" && $status == "true")
            $mensagem = "Registro alterado com Sucesso!";
        elseif($acao == "alterar" && $status == "false")
            $mensagem = "Erro ao alterar!";
        elseif($acao == "excluir" && $status == "true")
            $mensagem = "Registro Excluído com Sucesso!";
        elseif($acao == "excluir" && $status == "false")
            $mensagem = "Erro ao excluir!";
        else
            $mensagem = "";
        require_once("../src/Views/serie/serie.php");
    }

    public function inserir($params){
        require_once("../src/Views/serie/inserir_serie.html");
    }

    public function novo($params){
        $id = $_POST['id'] ?? 0;
        $nome = $_POST['nome'] ?? '';
        $criador = $_POST['criador'] ?? '';
    
        $serie = new serie($id, $nome, $criador);
        $serieDAO = new serieDAO();
        if ($serieDAO->inserir($serie)){
        header("location: /serie?inserir=true");
        } else {
        header("location: /serie?inserir=false");
        }
    }

    public function alterar($params){
        $serieDAO = new serieDAO();
        $resultado = $serieDAO->consultar($params[1]);
        require_once("../src/Views/serie/alterar_serie.php");
    }

    public function excluir($params){
        $SerieDAO = new SerieDAO();
        $resultado = $SerieDAO->consultar($params[1]);
        require_once("../src/Views/serie/excluir_serie.php");
    }

    public function editar($params){
        $Serie = new Serie($_POST['id'], $_POST['nome'], $_POST['criador']);
        $SerieDAO = new SerieDAO();
        if ($SerieDAO->alterar($Serie)){
            header("location: /serie/alterar/true");
        } else {
            header("location: /serie/alterar/false");
        }

    }

    public function deletar($params){
        $SerieDAO = new SerieDAO();
        if ($SerieDAO->excluir($_POST['id'])){
            header("location: /serie/excluir/true");
        } else {
            header("location: /serie/excluir/false");
        }
    }

}