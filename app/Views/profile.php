<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="profile-header">
    <h1>Mi Perfil</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
</div>



    <!-- FOTO DE PERFIL -->
    <?php if (!empty($profile['photo'])): ?>
        <div class="profile-photo">
            <img src="<?= base_url($profile['photo']) ?>" alt="Foto de perfil">
        </div>
    <?php endif; ?>

    <!-- DATOS PRINCIPALES -->
    <div class="profile-details">
        <p><strong>Biografía:</strong> <?= esc($profile['bio']) ?></p>
        <p><strong>Teléfono:</strong> <?= esc($profile['phone']) ?></p>
        <p>
            <strong>Enlace social:</strong>
            <a href="<?= esc($profile['social_link']) ?>" target="_blank" class="space-link">
                <?= esc($profile['social_link']) ?>
            </a>
        </p>

        <div class="profile-actions">
            <a href="/profile/edit" class="btn btn-primary">
                Editar perfil
            </a>
        </div>
    </div>



<hr>

<!-- Ofertas Locales -->
<div class="profile-section">
    <h2>Ofertas Locales</h2>
    <div class="section-links">
        <a href="/local-offers/create" class="btn btn-success">
            Publicar oferta
        </a>
        <a href="/local-offers/my-offers" class="btn btn-info">
            Gestionar ofertas
        </a>
    </div>
</div>

<hr>

<!-- Currículum -->
<div class="profile-section">
    <h2>Mi Currículum</h2>
    <div class="section-links">
        <a href="/jobs/create" class="btn btn-success">
            Agregar trabajo
        </a>
        <a href="/jobs" class="btn btn-primary">
            Ver currículum
        </a>
    </div>
</div>

<hr>

<!-- Servicios -->
<div class="profile-section">
    <h2>Servicios Publicados</h2>
    <div class="section-links">
        <a href="/services/create" class="btn btn-success">
            Publicar servicio
        </a>
        <a href="/services/my-posts" class="btn btn-info">
            Gestionar servicios
        </a>
    </div>
</div>

<?= $this->endSection() ?>