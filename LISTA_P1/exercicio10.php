<!DOCTYPE html>
<html>
<head>
    <title>Exercício 10</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
        }
        input[type="number"] {
            padding: 8px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Insira seu peso em KG: <input type="text" name="peso_atual"><br>
    Insira sua altura em MT: <input type="text" name="altura_atual"><br>
    <input type="submit" value="Calcular">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['peso_atual']) || empty($_POST['altura_atual'])) {
        echo "Porfavor, insira seu peso e altura.";
    } else {
        $peso_atual = floatval($_POST['peso_atual']);
        $altura_atual = floatval($_POST['altura_atual']);
        $imc = $peso_atual / ($altura_atual * $altura_atual);
        if ($imc < 18.5) {
            $categoria = "Você está abaixo do peso";
        } elseif ($imc >= 18.5 && $imc < 25) {
            $categoria = "Você está com o peso normal";
        } elseif ($imc >= 25 && $imc < 30) {
            $categoria = "Você está acima do peso";
        } else {
            $categoria = "Você está muito acima do peso, classificado como obeso";
        }

        echo "Seu IMC é: " . number_format($imc, 2) . "<br>";
        echo "" . $categoria . "<br><br>";
        }
    }
?>
    <br><br>
    <a href="index.php">Voltar a Página Principal</a>
    
</body>
</html>
