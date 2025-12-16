<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<!-- CAMBIO IMPORTANTE: action="/profile/edit" en lugar de "/auth/saveProfile" -->
<form action="/profile/edit" method="post" enctype="multipart/form-data">
    <div>
        <label for="bio">Bio:</label>
        <textarea name="bio" id="bio"><?= old('bio', $profile['bio'] ?? '') ?></textarea>
    </div>
    <div>
        <label for="phone">Teléfono:</label>
        <input type="text" name="phone" id="phone" value="<?= old('phone', $profile['phone'] ?? '') ?>" required>
    </div>
    <div>
        <label for="social_link">Enlace social:</label>
        <input type="text" name="social_link" id="social_link" value="<?= old('social_link', $profile['social_link'] ?? '') ?>" required>
    </div>
    <div>
        <label for="photo">Foto de perfil:</label>
        <input type="file" name="photo" id="photo">
        <?php if (isset($profile['photo']) && $profile['photo']): ?>
            <p>Foto actual: <img src="<?= base_url($profile['photo']) ?>" style="max-width: 100px;"></p>
        <?php endif; ?>
    </div>
    <button type="submit">Guardar perfil</button>
</form>