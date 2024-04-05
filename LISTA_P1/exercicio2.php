<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
</head>
<body>

<form method="post">
    <label for="numero1">Insira o 1º número:</label><br>
    <input type="text" id="numero1" name="numero1"><br>

    <label for="numero2">Insira o 2º número:</label><br>
    <input type="text" id="numero2" name="numero2"><br>

    <label for="numero3">Insira o 3º número:</label><br>
    <input type="text" id="numero3" name="numero3"><br>

    <label for="numero4">Insira o 4º número:</label><br>
    <input type="text" id="numero4" name="numero4"><br>

    <label for="numero5">Insira o 5º número:</label><br>
    <input type="text" id="numero5" name="numero5"><br>

    <label for="numero6">Insira o 6º número:</label><br>
    <input type="text" id="numero6" name="numero6"><br>

    <label for="numero7">Insira o 7º número:</label><br>
    <input type="text" id="numero7" name="numero7"><br>

    <input type="submit" value="Verificar Valores">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeros = array($_POST['numero1'], $_POST['numero2'], $_POST['numero3'], 
    $_POST['numero4'], $_POST['numero5'], $_POST['numero6'], $_POST['numero7']);

    $menorNumero = $numeros[0];
    $menorPosicao = 0;

    for ($indice = 1; $indice < count($numeros); $indice++) {
        if ($numeros[$indice] < $menorNumero) {
            $menorNumero = $numeros[$indice];
            $menorPosicao = $indice;
        }
    }

    echo "O menor número é: $menorNumero <br>";
    echo "Está na posição: $menorPosicao";
}
?>
</body>
</html>
