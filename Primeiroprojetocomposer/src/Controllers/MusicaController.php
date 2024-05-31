<?php

namespace Projeto\Controllers;

use Projeto\Models\DAO\MusicaDAO;
use Projeto\Models\Domain\Musica;

class MusicaController{
    public function inserir_musica($params){
        require_once("../src/Views/Musica/inserir_musica.html");
    }

    public function index($params){
        $musicaDAO = new MusicaDAO();
        $resultado = $musicaDAO->consultarTodos();
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
        require_once("../src/Views/musica/musica.php");
    }

    public function inserir($params){
        require_once("../src/Views/musica/inserir_musica.html");
    }

    public function novo($params){
        $id = $_POST['id'] ?? 0;
        $nome = $_POST['nome'] ?? '';
        $produtor = $_POST['produtor'] ?? '';
    
        $musica = new Musica($id, $nome, $produtor);
        $musicaDAO = new MusicaDAO();
        if ($musicaDAO->inserir($musica)){
        header("location: /musica?inserir=true");
        } else {
        header("location: /musica?inserir=false");
        }
    }

    public function alterar($params){
        $musicaDAO = new MusicaDAO();
        $resultado = $musicaDAO->consultar($params[1]);
        require_once("../src/Views/musica/alterar_musica.php");
    }

    public function excluir($params){
        $musicaDAO = new MusicaDAO();
        $resultado = $musicaDAO->consultar($params[1]);
        require_once("../src/Views/musica/excluir_musica.php");
    }

    public function editar($params){
        $musica = new Musica($_POST['id'], $_POST['nome'], $_POST['produtor']);
        $musicaDAO = new MusicaDAO();
        if ($musicaDAO->alterar($musica)){
            header("location: /musica/alterar/true");
        } else {
            header("location: /musica/alterar/false");
        }

    }

    public function deletar($params){
        $musicaDAO = new MusicaDAO();
        if ($musicaDAO->excluir($_POST['id'])){
            header("location: /musica/excluir/true");
        } else {
            header("location: /musica/excluir/false");
        }
    }

}