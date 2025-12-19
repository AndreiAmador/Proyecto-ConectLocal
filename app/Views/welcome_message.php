<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1>Servicios Disponibles</h1>

<!-- Links finales -->
<div class="actions">
    <?php if (!session()->get('loggedIn')): ?>
    <a href="/auth/login" class="btn btn-info">Iniciar sesión</a>
    <a href="/auth/register" class="btn btn-warning">Registrarse</a>
    <?php endif; ?>
</div>

<!-- Acciones si está logueado -->
<?php if (session()->get('loggedIn')): ?>
    <div class="actions">
        <a href="/services/create" class="btn btn-success">Publicar un nuevo servicio</a>
        <a href="/services/my-posts" class="btn btn-info">Ver mis publicaciones</a>
    </div>
<?php endif; ?>

<!-- Listado de servicios -->
<?php if (empty($posts)): ?>
    <p>No hay servicios publicados aún.</p>
<?php else: ?>
    <div class="cards-grid">
        <?php foreach ($posts as $post): ?>
            <div class="card service-card card-modal-trigger">
                <h3><?= esc($post['title']) ?></h3>

                <p><strong>Categoría:</strong> <?= esc($post['category']) ?></p>

                <p><strong>Descripción:</strong><br>
                    <?= nl2br(esc($post['description'])) ?>
                </p>

                <p><strong>Precio:</strong>
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
                    Publicado por:
                    <?= esc($post['username'] ?? 'Usuario') ?> |
                    <?= date('d/m/Y', strtotime($post['created_at'])) ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div> <!-- CIERRE DEL GRID -->
<?php endif; ?>

<hr>

<h2>Ofertas Locales</h2>
                <a href="/local-offers/create" class="btn btn-success">Publicar una nuevas ofertas</a>
                <a href="/local-offers/my-offers" class="btn btn-info">Mirar mis publiaciones de ofertas</a>

<?php if (empty($offers)): ?>
    <p>No hay ofertas locales publicadas aún.</p>
<?php else: ?>
    <div class="cards-grid">
        <?php foreach ($offers as $offer): ?>
            <div class="card offer-card card-modal-trigger">
                <h3><?= esc($offer['title']) ?></h3>

                <p><strong>Categoría:</strong> <?= esc($offer['category']) ?></p>

                <p><?= esc($offer['description']) ?></p>

                <p><strong>Precio:</strong>
                    $<?= number_format($offer['price'], 2) ?> MXN
                </p>

                <p><strong>Ubicación:</strong> <?= esc($offer['location']) ?></p>

                <?php if (!empty($offer['image_url'])): ?>
                    <img
                        src="<?= esc($offer['image_url']) ?>"
                        class="card-image"
                    >
                <?php endif; ?>

                <p class="meta">
                    Publicado por: <?= esc($offer['username']) ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
