<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1>Registro</h1>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<form action="/auth/registerPost" method="post" class="form">

    <div class="form-group">
        <label for="username">Usuario</label>
        <input type="text" name="username" id="username" required>
    </div>

    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div class="form-group">
        <label for="confirm_password">Confirmar contraseña</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
    </div>

    <button type="submit" class="btn btn-primary">
        Registrar
    </button>

</form>

<?= $this->endSection() ?>
