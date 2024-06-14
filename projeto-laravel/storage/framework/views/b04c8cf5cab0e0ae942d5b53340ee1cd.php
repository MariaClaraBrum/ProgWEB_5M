<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
    <h1>Produtos</h1>
    <a href="<?php echo e(\route('produtos.create')); ?>">Inserir Produto</a>

    <table>
            <tr>
                <td>Nome</td>
                <td></td>
            </tr>
            <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($c->nome); ?></td>
                <td>
                    <a href="<?php echo e(route('produtos.edit', $c->id)); ?>">Alterar</a>
                    <a href="/produto/delete/<?php echo e($c->id); ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html><?php /**PATH C:\xampp\htdocs\projeto-crud-1\resources\views/produto/index.blade.php ENDPATH**/ ?>