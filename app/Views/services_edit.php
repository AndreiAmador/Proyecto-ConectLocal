<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<title>Editar Publicación</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <section class="page-content">

        <h1>Editar Publicación</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="card" style="border-color:#ef4444; margin-bottom:24px;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="/services/update/<?= $post['id'] ?>" method="post">

            <div class="form-group">
                <label for="title">Título</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    value="<?= esc($post['title']) ?>"
                    required
                    placeholder="Ej: Electricista 24/7">
            </div>

            <div class="form-group select-space">
                <label for="category">Categoría</label>

                <select name="category" id="category" required>
                    <option value="">Selecciona una categoría</option>
                    <option value="Electricidad" <?= $post['category'] == 'Electricidad' ? 'selected' : '' ?>>Electricidad</option>
                    <option value="Plomería" <?= $post['category'] == 'Plomería' ? 'selected' : '' ?>>Plomería</option>
                    <option value="Mecánica" <?= $post['category'] == 'Mecánica' ? 'selected' : '' ?>>Mecánica</option>
                    <option value="Carpintería" <?= $post['category'] == 'Carpintería' ? 'selected' : '' ?>>Carpintería</option>
                    <option value="Jardinería" <?= $post['category'] == 'Jardinería' ? 'selected' : '' ?>>Jardinería</option>
                    <option value="Limpieza" <?= $post['category'] == 'Limpieza' ? 'selected' : '' ?>>Limpieza</option>
                    <option value="Construcción" <?= $post['category'] == 'Construcción' ? 'selected' : '' ?>>Construcción</option>
                    <option value="Pintura" <?= $post['category'] == 'Pintura' ? 'selected' : '' ?>>Pintura</option>
                    <option value="Otro" <?= $post['category'] == 'Otro' ? 'selected' : '' ?>>Otro</option>
                </select>

                <span class="select-icon">▾</span>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea
                    name="description"
                    id="description"
                    rows="6"
                    required
                    placeholder="Qué ofreces, zona, garantía, experiencia..."><?= esc($post['description']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="price">Precio (MXN)</label>
                <input
                    type="number"
                    name="price"
                    id="price"
                    step="0.01"
                    min="0"
                    value="<?= esc($post['price']) ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="image_url">Imagen (URL)</label>
                <input
                    type="text"
                    name="image_url"
                    id="image_url"
                    value="<?= esc($post['image_url']) ?>"
                    placeholder="https://.../foto.jpg">
            </div>

            <div style="display:flex; gap:16px; margin-top:32px;">
                <button type="submit" class="btn btn-success">
                    Actualizar Publicación
                </button>

                <a href="/services/my-posts" class="btn btn-error">
                    Cancelar
                </a>
            </div>

        </form>

    </section>
</div>

<?= $this->endSection() ?>