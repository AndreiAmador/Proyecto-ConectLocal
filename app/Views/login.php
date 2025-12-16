<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<form action="/auth/loginPost" method="post">
    <div>
        <label for="username">Usuario</label>
        <input type="text" name="username" id="username" required>
    </div>
    <div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
    </div>
    <button type="submit">Iniciar sesión</button>
</form>

<p>¿No tienes una cuenta? <a href="/auth/register">Regístrate aquí</a></p>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Iniciar sesión</h2>
<input type="text">
<button class="btn-primary">Login</button>

<?= $this->endSection() ?>
