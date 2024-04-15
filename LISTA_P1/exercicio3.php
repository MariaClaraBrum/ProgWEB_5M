<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3</title>
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
        label {
            font-weight: bold;
        }
        input[type="numero"] {
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
    <div class="container">
        <h2>Soma de Dois Valores</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="numero1">Valor 1:</label>
            <input type="numero" id="numero1" name="numero1" required><br><br>
            
            <label for="numero2">Valor 2:</label>
            <input type="numero" id="numero2" name="numero2" required><br><br>
            
            <input type="submit" value="Calcular">
        </form>
        
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero1 = $_POST["numero1"];
            $numero2 = $_POST["numero2"];
            
            function somaValores($numero1, $numero2) {
                $soma = $numero1 + $numero2;
                
                if ($numero1 == $numero2) {
                    $soma *= 3;
                }

                return $soma;
            }
            
            $resultado = somaValores($numero1, $numero2);
            echo "<p>A soma dos valores é: $resultado</p>";
        }
        ?>
    </div>
</body>
</html>



