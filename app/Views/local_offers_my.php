<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Mis ofertas locales</h2>

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
    <a href="/local-offers/create" class="btn btn-primary">
        Crear nueva oferta
    </a>
</div>

<?php if (empty($offers)): ?>
    <p>No has publicado ofertas locales.</p>
<?php else: ?>

    <div class="grid">
        <?php foreach ($offers as $offer): ?>
            <div class="card">

                <h3><?= esc($offer['title']) ?></h3>

                <p><strong>Categoría:</strong> <?= esc($offer['category']) ?></p>

                <p><?= nl2br(esc($offer['description'])) ?></p>

                <p><strong>Precio:</strong>
                    $<?= number_format($offer['price'], 2) ?> MXN
                </p>

                <p><strong>Ubicación:</strong>
                    <?= esc($offer['location']) ?>
                </p>

                <?php if (!empty($offer['image_url'])): ?>
                    <img
                        src="<?= esc($offer['image_url']) ?>"
                        alt="<?= esc($offer['title']) ?>"
                        class="img-preview"
                    >
                <?php endif; ?>

                <p class="text-muted">
                    Publicado: <?= date('d/m/Y', strtotime($offer['created_at'])) ?>
                </p>

                <div class="card-actions">
                    <a href="/local-offers/edit/<?= $offer['id'] ?>" class="btn btn-secondary">
                        Editar
                    </a>

                    <a
                        href="/local-offers/delete/<?= $offer['id'] ?>"
                        class="btn btn-danger"
                        onclick="return confirm('¿Eliminar esta oferta?')"
                    >
                        Eliminar
                    </a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>

<div class="actions">
    <a href="/profile" class="btn btn-secondary">Volver al perfil</a>
    <a href="/" class="btn btn-link">Ver todas las ofertas</a>
</div>

<?= $this->endSection() ?>