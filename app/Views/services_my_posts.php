<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h1 class="page-title">Mis Publicaciones de Servicios</h1>

    <div class="actions">
        <a href="/services/create" class="btn btn-primary">
            + Crear nueva publicación
        </a>
    </div>
</div>

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

<?php if (empty($posts)): ?>

    <p class="muted">No has publicado ningún servicio aún.</p>

<?php else: ?>

    <div class="grid">
        <?php foreach ($posts as $post): ?>
            <div class="card service-card">

                <h3 class="card-title"><?= esc($post['title']) ?></h3>

                <p><strong>Categoría:</strong> <?= esc($post['category']) ?></p>

                <p class="card-text">
                    <?= nl2br(esc($post['description'])) ?>
                </p>

                <p>
                    <strong>Precio:</strong>
                    $<?= number_format($post['price'], 2) ?> MXN
                </p>

                <?php if (!empty($post['image_url'])): ?>
                    <img
                        src="<?= esc($post['image_url']) ?>"
                        alt="<?= esc($post['title']) ?>"
                        class="img-preview"
                    >
                <?php endif; ?>

                <small class="muted">
                    Publicado: <?= date('d/m/Y', strtotime($post['created_at'])) ?>
                </small>

                <div class="card-actions">
                    <a href="/services/edit/<?= $post['id'] ?>" class="btn btn-secondary">
                        Editar
                    </a>

                    <a
                        href="/services/delete/<?= $post['id'] ?>"
                        class="btn btn-error"
                        onclick="return confirm('¿Eliminar esta publicación?')"
                    >
                        Eliminar
                    </a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>

<div class="actions bottom-actions">
    <a href="/profile" class="btn btn-secondary">
        ← Volver al perfil
    </a>

    <a href="/" class="btn btn-info">
        Ver todas las publicaciones
    </a>
</div>

<?= $this->endSection() ?>