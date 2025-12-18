<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h1 class="page-title">Servicios Disponibles</h1>

    <?php if (session()->get('loggedIn')): ?>
        <div class="actions">
            <a href="/services/create" class="btn btn-primary">
                + Publicar servicio
            </a>
            <a href="/services/my-posts" class="btn btn-secondary">
                Mis publicaciones
            </a>
        </div>
    <?php endif; ?>
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

<!-- ================= SERVICIOS ================= -->
<h2 class="section-title">Servicios</h2>

<?php if (empty($posts)): ?>
    <p class="muted">No hay servicios publicados aún.</p>
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
                    Publicado por <?= esc($post['username'] ?? 'Usuario') ?> ·
                    <?= date('d/m/Y', strtotime($post['created_at'])) ?>
                </small>

            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>

<hr>

<!-- ================= OFERTAS LOCALES ================= -->
<h2 class="section-title">Ofertas Locales</h2>

<?php if (empty($offers)): ?>
    <p class="muted">No hay ofertas locales publicadas aún.</p>
<?php else: ?>

    <div class="grid">
        <?php foreach ($offers as $offer): ?>
            <div class="card offer-card">

                <h3 class="card-title"><?= esc($offer['title']) ?></h3>

                <p><strong>Categoría:</strong> <?= esc($offer['category']) ?></p>

                <p class="card-text">
                    <?= nl2br(esc($offer['description'])) ?>
                </p>

                <p>
                    <strong>Precio:</strong>
                    $<?= number_format($offer['price'], 2) ?> MXN
                </p>

                <p>
                    <strong>Ubicación:</strong> <?= esc($offer['location']) ?>
                </p>

                <?php if (!empty($offer['image_url'])): ?>
                    <img
                        src="<?= esc($offer['image_url']) ?>"
                        alt="<?= esc($offer['title']) ?>"
                        class="img-preview"
                    >
                <?php endif; ?>

                <small class="muted">
                    Publicado por <?= esc($offer['username'] ?? 'Usuario') ?>
                </small>

            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>

<hr>

<!-- ================= ACCIONES FINALES ================= -->
<div class="actions bottom-actions">
    <?php if (session()->get('loggedIn')): ?>
        <a href="/profile" class="btn btn-secondary">
            Mi perfil
        </a>
        <a href="/auth/logout" class="btn btn-error">
            Cerrar sesión
        </a>
    <?php else: ?>
        <a href="/auth/login" class="btn btn-primary">
            Iniciar sesión
        </a>
        <a href="/auth/register" class="btn btn-info">
            Registrarse
        </a>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>