<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1>Agregar Trabajo Realizado</h1>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<form action="/jobs/store" method="post" class="card">
    <div class="form-group">
        <label for="job_title">Título del trabajo</label>
        <input type="text" name="job_title" id="job_title" required>
    </div>

    <div class="form-group">
        <label for="job_image">Imagen (URL)</label>
        <input type="text" name="job_image" id="job_image" placeholder="https://...">
    </div>

    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea name="description" id="description" rows="4" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Trabajo</button>
</form>

<p>
    <a href="/jobs" class="btn btn-secondary">← Volver</a>
</p>

<?= $this->endSection() ?>