<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Editar perfil</h2>

<!-- ALERTAS CON TU DISEÑO -->
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<!-- FORMULARIO CON DISEÑO -->
<form action="/profile/edit" method="post" enctype="multipart/form-data" class="card form">

    <div class="form-group">
        <label for="bio">Bio</label>
        <textarea name="bio" id="bio" rows="3"><?= old('bio', $profile['bio'] ?? '') ?></textarea>
    </div>

    <div class="form-group">
        <label for="phone">Teléfono</label>
        <input type="text" name="phone" id="phone"
               value="<?= old('phone', $profile['phone'] ?? '') ?>" required>
    </div>

    <div class="form-group">
        <label for="social_link">Enlace social</label>
        <input type="text" name="social_link" id="social_link"
               value="<?= old('social_link', $profile['social_link'] ?? '') ?>" required>
    </div>

    <div class="form-group">
        <label for="photo">Foto de perfil</label>
        <input type="file" name="photo" id="photo">

        <?php if (!empty($profile['photo'])): ?>
            <div class="profile-photo-preview">
                <p>Foto actual:</p>
                <img src="<?= base_url($profile['photo']) ?>" alt="Foto de perfil">
            </div>
        <?php endif; ?>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Guardar perfil</button>
        <a href="/profile" class="btn btn-secondary">Cancelar</a>
    </div>

</form>

<?= $this->endSection() ?>