<?php

namespace Projeto\Models\DAO;

use PDO;

class Conexao {

    private $conexao;

    public function __construct(){
        $this->conexao = new PDO("mysql:host=localhost; dbname=projeto", "root", "");
    }

    public function getConexao(){
        return $this->conexao;
    }
}