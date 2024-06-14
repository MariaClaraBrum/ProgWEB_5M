<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produto</title>
</head>
<body>
    <h1>Excluir Produto</h1>
    <p>Tem certeza que deseja excluir o produto {{ $produto->nome }}?</p>

    <form action="{{ route('produtos.destroy', $produtos->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Sim, excluir</button>
        <a href="{{ route('produtos.index') }}">Cancelar</a>
    </form>
</body>
</html>
