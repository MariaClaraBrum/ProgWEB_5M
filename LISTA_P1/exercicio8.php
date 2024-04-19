<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 8</title>
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
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="metro_4">Insira em metros quadrados o tamanho da área que será pintada :</label>
            <input type="number" id="metro_4" name="metro_4" step="any" required><br><br>
            
            <input type="submit" value="Calcular">
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $metro_4 = $_POST["metro_4"];
            $cobreporlitro = 3;
            $litroautilizar = $metro_4 / $cobreporlitro;
            $tamanhodaLata = 18;
            $latasAutilizar = $litroautilizar / $tamanhodaLata;
            $valor_total = $latasAutilizar * 80;
            echo "<p>A quantidade de latas de tinta para pintar a área de $metro_4 é de $latasAutilizar latas</p>";
            echo "<p>O preço total a pagar é de R$ $valor_total</p>";
        }
        ?>
    </div>
</body>
</html>
