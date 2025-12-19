<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1>Mis Publicaciones</h1>

<!-- Mensajes -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="card" style="border-left:4px solid #22c55e;">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="card" style="border-left:4px solid #ef4444;">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<!-- Acciones -->
<div class="actions" style="margin: 24px 0;">
    <a href="/services/create" class="btn btn-success">
        + Nueva publicación
    </a>
    <a href="/profile" class="btn btn-info">
        Volver al perfil
    </a>
</div>

<!-- Listado -->
<?php if (empty($posts)): ?>
    <p>No has publicado ningún servicio aún.</p>
<?php else: ?>

<div class="cards-grid">
<?php foreach ($posts as $post): ?>
    <div class="card service-card">

        <h3><?= esc($post['title']) ?></h3>

        <p><strong>Categoría:</strong> <?= esc($post['category']) ?></p>

        <p>
            <strong>Descripción:</strong><br>
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
                class="card-image"
            >
        <?php endif; ?>

        <p class="meta">
            Publicado: <?= date('d/m/Y', strtotime($post['created_at'])) ?>
        </p>

        <!-- Acciones de la card -->
        <div class="actions" style="margin-top:16px;">
            <a href="/services/edit/<?= $post['id'] ?>" class="btn btn-info">
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

<div class="actions" style="margin-top:40px;">
    <a href="/" class="btn btn-info">
        Ver todas las publicaciones
    </a>
    <a href="/" class="btn btn-secondary">Ver todas las ofertas</a>
</div>

<?= $this->endSection() ?>