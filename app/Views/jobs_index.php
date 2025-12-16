<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1 class="page-title">Mis Trabajos Realizados</h1>

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
    <a href="/jobs/create" class="btn btn-primary">
        + Agregar Nuevo Trabajo
    </a>
</div>

<?php if (empty($jobs)): ?>
    <p class="muted">No hay trabajos registrados aún.</p>
<?php else: ?>

    <div class="grid">
        <?php foreach ($jobs as $job): ?>
            <div class="card job-card">

                <h3 class="card-title">
                    <?= esc($job['job_title']) ?>
                </h3>

                <?php if (!empty($job['job_image'])): ?>
                    <img 
                        src="<?= esc($job['job_image']) ?>" 
                        alt="<?= esc($job['job_title']) ?>" 
                        class="job-image"
                    >
                <?php endif; ?>

                <p class="card-text">
                    <?= nl2br(esc($job['description'])) ?>
                </p>

                <small class="muted">
                    Agregado: <?= date('d/m/Y', strtotime($job['created_at'])) ?>
                </small>

                <div class="card-actions">
                    <a href="/jobs/edit/<?= $job['id'] ?>" class="btn btn-secondary">Editar</a>
                    <a href="/jobs/delete/<?= $job['id'] ?>" 
                       class="btn btn-danger"
                       onclick="return confirm('¿Estás seguro de eliminar este trabajo?')">
                        Eliminar
                    </a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>

<div class="actions">
    <a href="/profile" class="btn btn-secondary">
        ← Volver al perfil
    </a>
</div>

<?= $this->endSection() ?>


