<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Iniciar sesión</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<form action="/auth/loginPost" method="post" class="form">

    <div class="form-group">
        <label for="username">Usuario</label>
        <input type="text" name="username" id="username" required>
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
    </div>

    <button type="submit" class="btn btn-primary">
        Iniciar sesión
    </button>

</form>

<p class="mt">
    ¿No tienes una cuenta?
    <a href="/auth/register">Regístrate aquí</a>
</p>

<?= $this->endSection() ?>
