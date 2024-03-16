<?php

  require_once("config.php");

  function inserirProfessor($nome, $formacao, $telefone, $email, $id_aluno){
    global $pdo;
    $sql = "INSERT INTO professores (nome, formacao, telefone, email, id_aluno) VALUES 
    (:nome, :formacao, :telefone, :email, :id_aluno)";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(":nome", $nome);
    $stm->bindParam(":formacao", $formacao);
    $stm->bindParam(":telefone", $telefone);
    $stm->bindParam(":email", $email);
    $stm->bindParam(":id_aluno", $id_aluno);
    $stm->execute();
    header("Location: index.php?inserirprof=ok");
    exit();
  }

  function consultarAlunos(){
    global $pdo;
    $sql = "SELECT * FROM aluno";
    $stm = $pdo->query($sql);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

  if($_POST){
    if(isset($_POST['nome']) && isset($_POST['formacao']) && isset($_POST['telefone'])
     && isset($_POST['email']) && isset($_POST['id_aluno'])){
      inserirProfessor($_POST['nome'], $_POST['formacao'], $_POST['telefone'], $_POST['email'], $_POST['id_aluno']);
    }
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUDs Professor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="container">
    <h3>Inserir Professor</h3>
    <form action="inserir_prof.php" method="POST">
      <div class="row">
        <div class="col-7">
          <label for="nome" class="form-label">Informe o Nome:</label>
          <input type="text" id="nome" name="nome" class="form-control" required/>
        </div>
        <div class="col-5">
          <label for="formacao" class="form-label">Informe a Formação:</label>
          <input type="text" id="formacao" name="formacao" class="form-control" required/>
        </div>
        <div class="col-5">
          <label for="telefone" class="form-label">Informe o Telefone:</label>
          <input type="text" id="telefone" name="telefone" class="form-control" required/>
        </div>
        <div class="col-5">
          <label for="email" class="form-label">Informe o Email:</label>
          <input type="text" id="email" name="email" class="form-control" required/>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-6">
          <select name="id_aluno" class="form-select" required>
            <option value="">Selecione o Aluno</option>
            <?php
              $dados = consultarAlunos();
              if($dados != null)
                foreach($dados as $d){
                  echo "<option value='{$d['id']}'>{$d['nome']}</option>";
                }
            ?>
          </select>
      <br>
      <div class="row">
        <div class="col">
          <button class="btn btn-primary" type="submit">Inserir</button>
        </div>
      </div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>