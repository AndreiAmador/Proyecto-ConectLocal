<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Editar trabajo</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<form
    action="/jobs/update/<?= $job['id'] ?>"
    method="post"
    class="card form"
>

    <!-- TÍTULO -->
    <div class="form-group">
        <label for="job_title">Título del trabajo</label>
        <input
            type="text"
            name="job_title"
            id="job_title"
            value="<?= esc($job['job_title']) ?>"
            required
        >
    </div>

    <!-- IMAGEN -->
    <div class="form-group">
        <label for="job_image">Imagen (URL)</label>
        <input
            type="text"
            name="job_image"
            id="job_image"
            value="<?= esc($job['job_image']) ?>"
            placeholder="https://ejemplo.com/imagen.jpg"
        >
    </div>

    <!-- DESCRIPCIÓN -->
    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea
            name="description"
            id="description"
            rows="4"
            required
        ><?= esc($job['description']) ?></textarea>
    </div>

    <!-- ACCIONES -->
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">
             Actualizar trabajo
        </button>

        <a href="/jobs" class="btn btn-secondary">
            ← Volver
        </a>
    </div>

</form>

<?= $this->endSection() ?>
