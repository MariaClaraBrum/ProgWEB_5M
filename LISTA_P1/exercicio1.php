<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1</title>
</head>
<body>

<form method="post">
    <label for="numero">Insira um valor numérico:</label><br>
    <input type="text" id="numero" name="numero"><br>
    <input type="submit" value="Verificar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['numero'])) {
        $num = $_POST['numero'];        

        if (is_numeric($num)) {
            if ($num > 0) {
                echo "O número $num é positivo.";
            } elseif ($num < 0) {
                echo "O número $num é negativo.";
            }
        } else {
            echo "O valor inserido não é numérico! Digite Novamente!";
        }
    } else {
        echo "O número é igual a zero";
    }
}
?>
</body>
</html>
