<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Bienvenido a ConectLocal</h2>

<p>Esta es la página de inicio de la aplicación.</p>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<div class="actions">
    <a href="/auth/login" class="btn btn-primary">Entrar</a>
</div>

<?= $this->endSection() ?>
