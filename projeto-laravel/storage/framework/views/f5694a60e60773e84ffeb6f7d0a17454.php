<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Produtos</title>
</head>
<body>
    <h1>Formulário de Alterar dados de Produtos</h1>
    <form action="<?php echo e(route('produtos.update', $produtos->id)); ?>" method='POST'>
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <label for="nome">Informe o nome do produto</label>
        <input type="text" name="nome" id="nome" value="<?php echo e($produtos->nome); ?>"><br>
        <label for="preco">Informe o preço do produto</label>
        <input type="text" name="preco" id="preco" value="<?php echo e($produtos->preco); ?>"><br>
        <label for="categoria">Informe a categoria do produto</label>
        <input type="text" name="categoria" id="categoria" value="<?php echo e($produtos->categoria); ?>"></br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\projeto-crud-1\resources\views/produto/edit.blade.php ENDPATH**/ ?>