<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="auth-container">

    <h1 class="page-title">Registro</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="/auth/registerPost" method="post" class="card form auth-form">

        <div class="form-group">
            <label for="username">Usuario</label>
            <input
                type="text"
                name="username"
                id="username"
                placeholder="Nombre de usuario"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input
                type="email"
                name="email"
                id="email"
                placeholder="correo@ejemplo.com"
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

        <div class="form-group">
            <label for="confirm_password">Confirmar contraseña</label>
            <input
                type="password"
                name="confirm_password"
                id="confirm_password"
                placeholder="••••••••"
                required
            >
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-block">
                Crear cuenta
            </button>
        </div>

    </form>

    <p class="auth-footer">
        ¿Ya tienes una cuenta?
        <a href="/auth/login">Inicia sesión aquí</a>
    </p>

</div>

<?= $this->endSection() ?>
