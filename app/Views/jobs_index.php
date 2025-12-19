<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<title>Mis Trabajos</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <section class="page-content">

        <h1>Mis Trabajos Realizados</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="card" style="border-color:#22c55e; margin-bottom:24px; padding:16px;">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="card" style="border-color:#ef4444; margin-bottom:24px; padding:16px;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div style="margin-bottom:24px;">
            <a href="/jobs/create" class="btn btn-primary">Agregar Nuevo Trabajo</a>
        </div>

        <?php if (empty($jobs)): ?>
            <p>No hay trabajos registrados aún.</p>
        <?php else: ?>
            <div class="cards-grid">
                <?php foreach ($jobs as $job): ?>
                    <div class="card job-card">
                        <h3><?= esc($job['job_title']) ?></h3>

                        <?php if (!empty($job['job_image'])): ?>
                            <img src="<?= esc($job['job_image']) ?>" alt="<?= esc($job['job_title']) ?>" class="card-image">
                        <?php endif; ?>

                        <p><?= nl2br(esc($job['description'])) ?></p>

                        <p class="meta">
                            <small>Agregado: <?= date('d/m/Y', strtotime($job['created_at'])) ?></small>
                        </p>

                        <div style="margin-top:16px; display:flex; gap:12px;">
                            <a href="/jobs/edit/<?= $job['id'] ?>" class="btn btn-info">Editar</a>
                            <a href="/jobs/delete/<?= $job['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar este trabajo?')" class="btn btn-error">Eliminar</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div style="margin-top:24px;">
            <a href="/profile" class="btn btn-secondary">Volver al perfil</a>
        </div>

    </section>
</div>

<?= $this->endSection() ?>