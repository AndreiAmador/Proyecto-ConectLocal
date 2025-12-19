<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<title>Mis Ofertas Locales</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <section class="page-content">

        <h1>Mis Ofertas Locales</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="card" style="border-color:#22c55e; margin-bottom:24px;">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="card" style="border-color:#ef4444; margin-bottom:24px;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div style="margin-bottom:24px;">
            <a href="/local-offers/create" class="btn btn-success">Crear nueva oferta</a>
        </div>

        <?php if (empty($offers)): ?>
            <div class="card">
                <p>No has publicado ofertas locales.</p>
            </div>
        <?php else: ?>
            <div class="cards-grid">
                <?php foreach ($offers as $offer): ?>
                    <div class="card offer-card">
                        <h3><?= esc($offer['title']) ?></h3>

                        <p><strong>Categoría:</strong> <?= esc($offer['category']) ?></p>

                        <p><strong>Descripción:</strong><br>
                            <?= nl2br(esc($offer['description'])) ?>
                        </p>

                        <p><strong>Precio:</strong> $<?= number_format($offer['price'], 2) ?> MXN</p>

                        <p><strong>Ubicación:</strong> <?= esc($offer['location']) ?></p>

                        <?php if (!empty($offer['image_url'])): ?>
                            <img
                                src="<?= esc($offer['image_url']) ?>"
                                alt="<?= esc($offer['title']) ?>"
                                class="card-image"
                            >
                        <?php endif; ?>

                        <p class="meta">
                            Publicado: <?= date('d/m/Y', strtotime($offer['created_at'])) ?>
                        </p>

                        <div style="display:flex; gap:12px; margin-top:16px;">
                            <a href="/local-offers/edit/<?= $offer['id'] ?>" class="btn btn-info">Editar</a>
                            <a href="/local-offers/delete/<?= $offer['id'] ?>" class="btn btn-error"
                               onclick="return confirm('¿Eliminar esta oferta?')">Eliminar</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div style="margin-top:24px;">
            <a href="/profile" class="btn btn-primary">Volver al perfil</a>
            <a href="/" class="btn btn-secondary">Ver todas las ofertas</a>
        </div>

    </section>
</div>

<?= $this->endSection() ?>