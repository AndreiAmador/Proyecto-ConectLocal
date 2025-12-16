<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a CodeIgniter</title>
</head>
<body>
    <h1>Bienvenido a tu aplicación de CodeIgniter 4</h1>

    <!-- Puedes agregar más contenido estático o dinámico aquí -->
    <p>Esta es la página de inicio.</p>

    <!-- Mostrar un mensaje de error o éxito (opcional) -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>
</body>
</html>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Bienvenido</h2>
<button class="btn-primary">Entrar</button>

<?= $this->endSection() ?>
