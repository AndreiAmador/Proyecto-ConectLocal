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

<div class="profile-info">

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
        <p><strong>Enlace social:</strong> 
            <a href="<?= esc($profile['social_link']) ?>" target="_blank">
                <?= esc($profile['social_link']) ?>
            </a>
        </p>

        <div class="profile-actions" style="margin-top: 20px; display: flex; gap: 12px;">
            <a href="/profile/edit" class="btn btn-primary">Editar perfil</a>
            <a href="/auth/logout" class="btn btn-error">Cerrar sesión</a>
        </div>
    </div>
</div>

<hr>

<!-- Sección de Ofertas Locales -->
<div class="profile-section">
    <h2>Ofertas Locales</h2>
    <div class="section-links" style="display: flex; gap: 12px; flex-wrap: wrap;">
        <a href="/local-offers/create" class="btn btn-success">Publicar nueva oferta local</a>
        <a href="/local-offers/my-offers" class="btn btn-info">Gestionar mis ofertas</a>
    </div>
</div>

<hr>

<!-- Sección de CV/Trabajos -->
<div class="profile-section">
    <h2>Mi Currículum</h2>
    <div class="section-links" style="display: flex; gap: 12px; flex-wrap: wrap;">
        <a href="/jobs/create" class="btn btn-success">Agregar nuevo trabajo</a>
        <a href="/jobs" class="btn btn-primary">Ver y gestionar mi currículum</a>
    </div>
</div>

<hr>

<!-- Sección de Servicios -->
<div class="profile-section">
    <h2>Servicios Publicados</h2>
    <div class="section-links" style="display: flex; gap: 12px; flex-wrap: wrap;">
        <a href="/services/create" class="btn btn-success">Publicar nuevo servicio</a>
        <a href="/services/my-posts" class="btn btn-info">Gestionar mis publicaciones</a>
    </div>
</div>

<?= $this->endSection() ?>