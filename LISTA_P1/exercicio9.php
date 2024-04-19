<!DOCTYPE html>
<html>
<head>
    <title>Exercício 9</title>
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
    Insira seu ano de Nascimento: <input type="text" name="anoDEnascimento">
    <input type="submit">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['anoDEnascimento'])) {
        echo "Por favor, preencha o ano de nascimento.";
    } else {
        $anoDEnascimento = intval($_POST['anoDEnascimento']);
        $ano_atual = date("Y");
        $idade = $ano_atual - $anoDEnascimento;
        $diasVivo = $idade * 365;
        $idade2025 = 2025 - $anoDEnascimento;

        echo "Sua idade atual é " . $idade . " anos<br>";
        echo "Faz " . $diasVivo . " dias que você está vivo<br>";
        echo "Sua idade em 2025 será de " . $idade2025 . " anos";
    }
}
?>
</body>
</html>
