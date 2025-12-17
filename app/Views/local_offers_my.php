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

<!-- ACCIÓN PRINCIPAL -->
<div class="actions" style="margin-bottom: 30px;">
    <a href="/local-offers/create" class="btn btn-primary">
         Crear nueva oferta
    </a>
</div>

<?php if (empty($offers)): ?>

    <p>No has publicado ofertas locales.</p>

<?php else: ?>

    <!-- GRID DE OFERTAS -->
    <div class="grid">

        <?php foreach ($offers as $offer): ?>

            <div class="card">

                <h3><?= esc($offer['title']) ?></h3>

                <p><strong>Categoría:</strong> <?= esc($offer['category']) ?></p>

                <p><?= nl2br(esc($offer['description'])) ?></p>

                <p>
                    <strong>Precio:</strong>
                    $<?= number_format($offer['price'], 2) ?> MXN
                </p>

                <p>
                    <strong>Ubicación:</strong>
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

                <!-- BOTONES DE ACCIÓN -->
                <div class="card-actions">
                    <a
                        href="/local-offers/edit/<?= $offer['id'] ?>"
                        class="btn btn-primary"
                    >
                         Editar
                    </a>

                    <a
                        href="/local-offers/delete/<?= $offer['id'] ?>"
                        class="btn btn-error"
                        onclick="return confirm('¿Eliminar esta oferta?')"
                    >
                        🗑 Eliminar
                    </a>
                </div>

            </div>

        <?php endforeach; ?>

    </div>

<?php endif; ?>

<!-- ACCIONES FINALES -->
<div class="actions" style="margin-top: 40px; display: flex; gap: 12px; flex-wrap: wrap;">
    <a href="/profile" class="btn btn-secondary">
        ← Volver al perfil
    </a>

    <a href="/" class="btn btn-info">
         Ver todas las ofertas
    </a>
</div>

<?= $this->endSection() ?>
