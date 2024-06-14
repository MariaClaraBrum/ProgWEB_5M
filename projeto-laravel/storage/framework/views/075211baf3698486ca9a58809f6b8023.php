<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Produtos</title>
</head>
<body>
    <h1>Formulário de Exclusão de Produtos</h1>
    <form action="<?php echo e(route('produtos.destroy', $produtos->id)); ?>" method='POST'>
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <label for="nome">Nome do Produto</label>
        <input type="text" name="nome" id="nome" value="<?php echo e($produtos->nome); ?>" disabled><br>
        <label for="preco">Preço do Produto</label>
        <input type="text" name="preco" id="preco" value="<?php echo e($produtos->preco); ?>" disabled><br>
        <label for="categoria">Categoria do Produto</label>
        <input type="text" name="categoria" id="categoria" value="<?php echo e($produtos->categoria); ?>" disabled></br>
        <button type="submit">Excluir</button>
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\projeto-crud-1\resources\views/produto/delete.blade.php ENDPATH**/ ?>