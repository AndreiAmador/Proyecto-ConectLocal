<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1>Servicios Disponibles</h1>

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

<?php if (session()->get('loggedIn')): ?>
    <p>
        <a href="/services/create" class="btn btn-primary">Publicar servicio</a>
        <a href="/services/my-posts" class="btn btn-secondary">Mis publicaciones</a>
    </p>
<?php endif; ?>

<hr>

<h2>Servicios</h2>

<?php if (empty($posts)): ?>
    <p>No hay servicios publicados aún.</p>
<?php else: ?>
    <?php foreach ($posts as $post): ?>
        <div class="card">

            <h3><?= esc($post['title']) ?></h3>

            <p><strong>Categoría:</strong> <?= esc($post['category']) ?></p>

            <p><?= nl2br(esc($post['description'])) ?></p>

            <p><strong>Precio:</strong> $<?= number_format($post['price'], 2) ?> MXN</p>

            <?php if (!empty($post['image_url'])): ?>
                <img src="<?= esc($post['image_url']) ?>" style="max-width:300px;">
            <?php endif; ?>

            <p class="text-muted">
                Publicado por <?= esc($post['username'] ?? 'Usuario') ?> |
                <?= date('d/m/Y', strtotime($post['created_at'])) ?>
            </p>

        </div>
    <?php endforeach; ?>
<?php endif; ?>

<hr>

<h2>Ofertas Locales</h2>

<?php if (empty($offers)): ?>
    <p>No hay ofertas locales publicadas aún.</p>
<?php else: ?>
    <?php foreach ($offers as $offer): ?>
        <div class="card">

            <h3><?= esc($offer['title']) ?></h3>

            <p><strong>Categoría:</strong> <?= esc($offer['category']) ?></p>

            <p><?= esc($offer['description']) ?></p>

            <p><strong>Precio:</strong> $<?= number_format($offer['price'], 2) ?> MXN</p>

            <p><strong>Ubicación:</strong> <?= esc($offer['location']) ?></p>

            <?php if (!empty($offer['image_url'])): ?>
                <img src="<?= esc($offer['image_url']) ?>" style="max-width:300px;">
            <?php endif; ?>

            <p class="text-muted">
                Publicado por <?= esc($offer['username'] ?? 'Usuario') ?>
            </p>

        </div>
    <?php endforeach; ?>
<?php endif; ?>

<hr>

<?php if (session()->get('loggedIn')): ?>
    <p>
        <a href="/profile">Mi perfil</a> |
        <a href="/auth/logout">Cerrar sesión</a>
    </p>
<?php else: ?>
    <p>
        <a href="/auth/login">Iniciar sesión</a> |
        <a href="/auth/register">Registrarse</a>
    </p>
<?php endif; ?>

<?= $this->endSection() ?>