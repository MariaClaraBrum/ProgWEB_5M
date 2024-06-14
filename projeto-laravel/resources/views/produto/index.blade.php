<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
    <h1>Produtos</h1>
    <a href="{{ \route('produtos.create') }}">Inserir Produto</a>

    <table>
            <tr>
                <td>Nome</td>
                <td></td>
            </tr>
            @foreach ($produtos as $c)
            <tr>
                <td>{{ $c->nome }}</td>
                <td>
                    <a href="{{ route('produtos.edit', $c->id) }}">Alterar</a>
                    <a href="/produtos/delete/{{$c->id}}">Excluir</a>
                </td>
            </tr>
            @endforeach
    </table>
</body>
</html>