<?php

namespace Projeto\Controllers;

use Projeto\Models\DAO\FilmeDAO;
use Projeto\Models\Domain\Filme;

class FilmeController{
    public function inserir_filme($params){
        require_once("../src/Views/Filme/inserir_filme.html");
    }

    public function index($params){
        $FilmeDAO = new FilmeDAO();
        $resultado = $FilmeDAO->consultarTodos();
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
        require_once("../src/Views/filme/filme.php");
    }

    public function inserir($params){
        require_once("../src/Views/filme/inserir_Filme.html");
    }

    public function novo($params){
        $id = $_POST['id'] ?? 0;
        $nome = $_POST['nome'] ?? '';
        $autor = $_POST['autor'] ?? '';
    
        $filme = new Filme($id, $nome, $autor);
        $FilmeDAO = new FilmeDAO();
        if ($FilmeDAO->inserir($filme)){
        header("location: /filme?inserir=true");
        } else {
        header("location: /filme?inserir=false");
        }
    }

    public function alterar($params){
        $FilmeDAO = new FilmeDAO();
        $resultado = $FilmeDAO->consultar($params[1]);
        require_once("../src/Views/filme/alterar_filme.php");
    }

    public function excluir($params){
        $FilmeDAO = new FilmeDAO();
        $resultado = $FilmeDAO->consultar($params[1]);
        require_once("../src/Views/filme/excluir_filme.php");
    }

    public function editar($params){
        $filme = new Filme($_POST['id'], $_POST['nome'], $_POST['autor']);
        $FilmeDAO = new FilmeDAO();
        if ($FilmeDAO->alterar($filme)){
            header("location: /filme/alterar/true");
        } else {
            header("location: /filme/alterar/false");
        }

    }

    public function deletar($params){
        $FilmeDAO = new FilmeDAO();
        if ($FilmeDAO->excluir($_POST['id'])){
            header("location: /filme/excluir/true");
        } else {
            header("location: /filme/excluir/false");
        }
    }

}