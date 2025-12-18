<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2 class="page-title">Iniciar sesión</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<form action="/auth/loginPost" method="post" class="card form">

    <div class="form-group">
        <label for="username">Usuario</label>
        <input
            type="text"
            name="username"
            id="username"
            placeholder="Tu usuario"
            required
        >
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        <input
            type="password"
            name="password"
            id="password"
            placeholder="••••••••"
            required
        >
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">
             Iniciar sesión
        </button>
    </div>

</form>

<p class="muted center-text mt">
    ¿No tienes una cuenta?
    <a href="/auth/register" class="space-link">
        Regístrate aquí
    </a>
</p>

<?= $this->endSection() ?>
