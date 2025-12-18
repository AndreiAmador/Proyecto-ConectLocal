<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="form-container">

    <h1 class="page-title">Editar Publicación</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="/services/update/<?= $post['id'] ?>" method="post" class="card form service-form">

        <div class="form-group">
            <label for="title">Título del servicio</label>
            <input
                type="text"
                name="title"
                id="title"
                value="<?= esc($post['title']) ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="category">Categoría</label>
            <select name="category" id="category" required>
                <?php
                $categories = [
                    'Electricidad','Plomería','Mecánica','Carpintería',
                    'Jardinería','Limpieza','Construcción','Pintura','Otro'
                ];
                foreach ($categories as $cat):
                ?>
                    <option value="<?= $cat ?>" <?= $post['category'] === $cat ? 'selected' : '' ?>>
                        <?= $cat ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea
                name="description"
                id="description"
                rows="5"
                required
            ><?= esc($post['description']) ?></textarea>
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
                required
            >
        </div>

        <div class="form-group">
            <label for="image_url">Imagen (URL)</label>
            <input
                type="text"
                name="image_url"
                id="image_url"
                value="<?= esc($post['image_url']) ?>"
                placeholder="https://ejemplo.com/imagen.jpg"
            >
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-block">
                Guardar cambios
            </button>

            <a href="/services/my-posts" class="btn btn-secondary btn-block">
                Cancelar
            </a>
        </div>

    </form>

</div>

<?= $this->endSection() ?>