<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de</title>
</head>
<body>
    <h1>Formulário de Exclusão de Produtos</h1>
    <form action="{{ route('produtos.destroy', $produto->id) }}" method='POST'>
        @CSRF
        @method('DELETE')
        <label for="nome">Nome do Produto</label>
        <input type="text" name="nome" id="nome" value="{{$produto->nome}}" disabled><br>
        <label for="preco">Preço do Produto</label>
        <input type="text" name="preco" id="preco" value="{{$produto->preco}}" disabled><br>
        <label for="categoria">Categoria do Produto</label>
        <input type="text" name="categoria" id="categoria" value="{{$produto->categoria}}" disabled></br>
        <button type="submit">Excluir</button>
    </form>
</body>
</html>