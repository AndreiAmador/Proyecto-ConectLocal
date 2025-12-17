<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1>Mis Publicaciones de Servicios</h1>

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

<p>
    <a href="/services/create" class="btn btn-primary">
        Crear nueva publicación
    </a>
</p>

<?php if (empty($posts)): ?>

    <p>No has publicado ningún servicio aún.</p>

<?php else: ?>

    <?php foreach ($posts as $post): ?>
        <div class="card">

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
                    style="max-width: 200px;"
                >
            <?php endif; ?>

            <p class="text-muted">
                Publicado: <?= date('d/m/Y', strtotime($post['created_at'])) ?>
            </p>

            <div class="actions">
                <a href="/services/edit/<?= $post['id'] ?>" class="btn btn-secondary">
                    Editar
                </a>

                <a
                    href="/services/delete/<?= $post['id'] ?>"
                    class="btn btn-danger"
                    onclick="return confirm('¿Eliminar esta publicación?')"
                >
                    Eliminar
                </a>
            </div>

        </div>
    <?php endforeach; ?>

<?php endif; ?>

<p class="mt">
    <a href="/profile">Volver al perfil</a> |
    <a href="/">Ver todas las publicaciones</a>
</p>

<?= $this->endSection() ?>