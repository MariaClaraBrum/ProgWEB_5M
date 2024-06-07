<?php

namespace Projeto\Controllers;

use Projeto\Models\DAO\MusicaDAO;
use Projeto\Models\Domain\Musica;

class MusicaController{
    public function inserir_musica($params){
        require_once("../src/Views/Musica/inserir_musica.html");
    }

    public function index($params){
        $MusicaDAO = new MusicaDAO();
        $resultado = $MusicaDAO->consultarTodos();
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
        require_once("../src/Views/musica/inserir_Musica.html");
    }

    public function novo($params){
        $id = $_POST['id'] ?? 0;
        $nome = $_POST['nome'] ?? '';
        $produtor = $_POST['produtor'] ?? '';
    
        $musica = new Musica($id, $nome, $produtor);
        $MusicaDAO = new MusicaDAO();
        $MusicaDAO->inserir($musica);
        if ($MusicaDAO->inserir($musica)){
        header("location: /musica?inserir=true");
        } else {
        header("location: /musica?inserir=false");
        }
    }

    public function alterar($params){
        $MusicaDAO = new MusicaDAO();
        $resultado = $MusicaDAO->consultar($params[1]);
        require_once("../src/Views/musica/alterar_musica.php");
    }

    public function excluir($params){
        $MusicaDAO = new MusicaDAO();
        $resultado = $MusicaDAO->consultar($params[1]);
        require_once("../src/Views/musica/excluir_musica.php");
    }

    public function editar($params){
        $musica = new Musica($_POST['id'], $_POST['nome'], $_POST['produtor']);
        $MusicaDAO = new MusicaDAO();
        if ($MusicaDAO->alterar($musica)){
            header("location: /musica/alterar/true");
        } else {
            header("location: /musica/alterar/false");
        }

    }

    public function deletar($params){
        $MusicaDAO = new MusicaDAO();
        if ($MusicaDAO->excluir($_POST['id'])){
            header("location: /musica/excluir/true");
        } else {
            header("location: /musica/excluir/false");
        }
    }

}