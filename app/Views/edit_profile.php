<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<title>Editar Perfil</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <section class="page-content">

        <h1>Editar Perfil</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="card" style="border-color:#ef4444; margin-bottom:24px; padding:16px;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="card" style="border-color:#22c55e; margin-bottom:24px; padding:16px;">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <div class="card" style="padding:24px;">
            <form action="/profile/edit" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="bio">Biografía</label>
                    <textarea name="bio" id="bio" rows="4" placeholder="Cuéntanos sobre ti"><?= old('bio', $profile['bio'] ?? '') ?></textarea>
                </div>

                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        value="<?= old('phone', $profile['phone'] ?? '') ?>"
                        required
                        placeholder="Ej: 55 1234 5678">
                </div>

                <div class="form-group">
                    <label for="social_link">Enlace social</label>
                    <input
                        type="text"
                        name="social_link"
                        id="social_link"
                        value="<?= old('social_link', $profile['social_link'] ?? '') ?>"
                        required
                        placeholder="Ej: https://twitter.com/usuario">
                </div>

                <div class="form-group">
    <label for="photo">Foto de perfil</label>

    <!-- Botón personalizado -->
    <div class="custom-file-upload" onclick="document.getElementById('photo').click()">
        Seleccionar foto
    </div>

    <!-- Input oculto -->
    <input type="file" name="photo" id="photo" style="display:none;" onchange="previewPhoto(this)">

    <!-- Vista previa -->
    <?php if (!empty($profile['photo'])): ?>
        <p>Foto actual:</p>
        <img id="photo-preview" src="<?= base_url($profile['photo']) ?>" style="max-width: 100px; border-radius:8px; margin-top:8px;">
    <?php else: ?>
        <img id="photo-preview" src="" style="max-width:100px; border-radius:8px; margin-top:8px; display:none;">
    <?php endif; ?>
</div>

                <div style="display:flex; gap:16px; margin-top:24px;">
                    <button type="submit" class="btn btn-success">Guardar perfil</button>
                    <a href="/profile" class="btn btn-error">Cancelar</a>
                </div>

            </form>
        </div>

    </section>
</div>


<script>
function previewPhoto(input) {
    const preview = document.getElementById('photo-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<?= $this->endSection() ?>