<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Inserção de produtos</title>
</head>
<body>
    <h1>Formulário de Inserção de Produtos</h1>
    <form action="<?php echo e(route('produtos.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="nome">Informe o nome do Produto</label>
        <input type="text" name="nome" id="nome"><br>
        <label for="preco">Informe o preço  do Produto</label>
        <input type="text" name="preco" id="preco"><br>
        <label for="categoria">Informe a categoria do Produto</label>
        <input type="text" name="categoria" id="categoria"></br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\projeto-crud-1\resources\views/produto/create.blade.php ENDPATH**/ ?>