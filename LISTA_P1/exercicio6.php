<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 6</title>
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
            <label for="numeroA">Valor A:</label>
            <input type="number" id="numeroA" name="numeroA" required><br><br>
            
            <label for="numeroB">Valor B:</label>
            <input type="number" id="numeroB" name="numeroB" required><br><br>
            
            <input type="submit" value="Verificar">
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numeroA = $_POST["numeroA"];
            $numeroB = $_POST["numeroB"];
            
            if ($numeroA == $numeroB) {
                echo "<p>Números iguais: $numeroA</p>";
            } else {
                if ($numeroA < $numeroB) {
                    echo "<p>$numeroA $numeroB</p>";
                } else {
                    echo "<p>$numeroB $numeroA</p>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
