<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container">

    <div class="card profile-card">

        <h1>Mi Perfil</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- ===== HEADER PERFIL ===== -->
        <div class="profile-header">

            <div class="profile-avatar">
                <?php if (!empty($profile['photo'])): ?>
                    <img src="<?= base_url('public/' . $profile['photo']) ?>">
                <?php else: ?>
                    <img src="<?= base_url('img/avatar-default.png') ?>">
                <?php endif; ?>
            </div>

            <div class="profile-info">
                <h2><?= esc($profile['username'] ?? 'Usuario') ?></h2>
                <p><?= esc($profile['bio'] ?? 'Sin biografía') ?></p>
                <p><strong>Tel:</strong> <?= esc($profile['phone'] ?? '—') ?></p>

                <?php if (!empty($profile['social_link'])): ?>
                    <a href="<?= esc($profile['social_link']) ?>" target="_blank">
                        <?= esc($profile['social_link']) ?>
                    </a>
                <?php endif; ?>

                <br><br>
                <a href="/profile/edit" class="btn btn-info">Editar perfil</a>
            </div>

        </div>

        <!-- ===== BLOQUES ===== -->

        <section class="profile-section">
            <h3>Ofertas Locales</h3>
            <div class="profile-actions">
                <a href="/local-offers/create" class="btn btn-primary">Publicar</a>
                <a href="/local-offers/my-offers" class="btn btn-secondary">Gestionar</a>
            </div>
        </section>

        <section class="profile-section">
            <h3>Mi Currículum</h3>
            <div class="profile-actions">
                <a href="/jobs/create" class="btn btn-primary">Agregar</a>
                <a href="/jobs" class="btn btn-secondary">Ver CV</a>
            </div>
        </section>

        <section class="profile-section">
            <h3>Servicios</h3>
            <div class="profile-actions">
                <a href="/services/create" class="btn btn-primary">Nuevo</a>
                <a href="/services/my-posts" class="btn btn-secondary">Gestionar</a>
            </div>
        </section>

        <hr>

        <a href="<?= site_url('auth/logout') ?>" class="btn btn-error">
            Cerrar sesión
        </a>

    </div>

</div>

<?= $this->endSection() ?>