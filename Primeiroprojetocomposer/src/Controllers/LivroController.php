<?php

namespace Projeto\Controllers;

use Projeto\Models\DAO\LivroDAO;
use Projeto\Models\Domain\Livro;

class LivroController{
    public function inserir_livro($params){
        require_once("../src/Views/Livro/inserir_livro.html");
    }

    public function index($params){
        $LivroDAO = new LivroDAO();
        $resultado = $LivroDAO->consultarTodos();
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
        require_once("../src/Views/livro/livro.php");
    }

    public function inserir($params){
        require_once("../src/Views/livro/inserir_livro.html");
    }

    public function novo($params){
        $id = $_POST['id'] ?? 0;
        $nome = $_POST['nome'] ?? '';
        $escritor = $_POST['escritor'] ?? '';
    
        $livro = new Livro($id, $nome, $escritor);
        $LivroDAO = new LivroDAO();
        if ($LivroDAO->inserir($livro)){
        header("location: /livro?inserir=true");
        } else {
        header("location: /livro?inserir=false");
        }
    }

    public function alterar($params){
        $LivroDAO = new LivroDAO();
        $resultado = $LivroDAO->consultar($params[1]);
        require_once("../src/Views/livro/alterar_livro.php");
    }

    public function excluir($params){
        $LivroDAO = new LivroDAO();
        $resultado = $LivroDAO->consultar($params[1]);
        require_once("../src/Views/livro/excluir_livro.php");
    }

    public function editar($params){
        $livro = new Livro($_POST['id'], $_POST['nome'], $_POST['escritor']);
        $LivroDAO = new LivroDAO();
        if ($LivroDAO->alterar($livro)){
            header("location: /livro/alterar/true");
        } else {
            header("location: /livro/alterar/false");
        }

    }

    public function deletar($params){
        $LivroDAO = new LivroDAO();
        if ($LivroDAO->excluir($_POST['id'])){
            header("location: /livro/excluir/true");
        } else {
            header("location: /livro/excluir/false");
        }
    }

}