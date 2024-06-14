<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Produtos</title>
</head>
<body>
    <h1>Formulário de Alterar dados de Produtos</h1>
    <form action="{{ route('produtos.update', $produto->id) }}" method='POST'>
        @CSRF
        @method('PUT')
        <label for="nome">Informe o nome do produto</label>
        <input type="text" name="nome" id="nome" value="{{$produto->nome}}"><br>
        <label for="preco">Informe o preço do produto</label>
        <input type="text" name="preco" id="preco" value="{{$produto->preco}}"><br>
        <label for="categoria">Informe a categoria do produto</label>
        <input type="text" name="categoria" id="categoria" value="{{$produto->categoria}}"></br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>