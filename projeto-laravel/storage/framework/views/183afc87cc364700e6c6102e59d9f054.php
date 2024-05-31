<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Inserção de Clientes</title>
</head>
<body>
    <h1>Formulário de Alterar dados de Clientes</h1>
    <form action="<?php echo e(route('clientes.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <label for="nome">Informe o nome do Cliente</label>
        <input type="text" name="nome" id="nome" value="<?php echo e($cliente->id); ?>"><br>
        <label for="telefone">Informe o telefone do Cliente</label>
        <input type="text" name="telefone" id="telefone" value="<?php echo e($cliente->telefone); ?>"><br>
        <label for="email">Informe o email do Cliente</label>
        <input type="text" name="email" id="email" value="<?php echo e($cliente->email); ?>"></br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html><?php /**PATH C:\Users\aluno\Downloads\projeto-crud\projeto-crud\resources\views/cliente/edit.blade.php ENDPATH**/ ?>