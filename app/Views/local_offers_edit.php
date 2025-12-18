<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2 class="page-title">Editar oferta local</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<form action="/local-offers/update/<?= $offer['id'] ?>" method="post" class="card form">

    <!-- TÍTULO -->
    <div class="form-group">
        <label for="title">Título de la oferta</label>
        <input
            type="text"
            name="title"
            id="title"
            value="<?= esc($offer['title']) ?>"
            required
        >
    </div>

    <!-- CATEGORÍA -->
    <div class="form-group">
        <label for="category">Categoría</label>
        <select name="category" id="category" required>
            <option value="Electrónica" <?= $offer['category'] === 'Electrónica' ? 'selected' : '' ?>>Electrónica</option>
            <option value="Ropa" <?= $offer['category'] === 'Ropa' ? 'selected' : '' ?>>Ropa</option>
            <option value="Hogar" <?= $offer['category'] === 'Hogar' ? 'selected' : '' ?>>Hogar</option>
            <option value="Deportes" <?= $offer['category'] === 'Deportes' ? 'selected' : '' ?>>Deportes</option>
            <option value="Alimentos" <?= $offer['category'] === 'Alimentos' ? 'selected' : '' ?>>Alimentos</option>
            <option value="Otros" <?= $offer['category'] === 'Otros' ? 'selected' : '' ?>>Otros</option>
        </select>
    </div>

    <!-- DESCRIPCIÓN -->
    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea
            name="description"
            id="description"
            rows="4"
            required
        ><?= esc($offer['description']) ?></textarea>
    </div>

    <!-- PRECIO -->
    <div class="form-group">
        <label for="price">Precio (MXN)</label>
        <input
            type="number"
            name="price"
            id="price"
            step="0.01"
            min="0"
            value="<?= esc($offer['price']) ?>"
            required
        >
    </div>

    <!-- UBICACIÓN -->
    <div class="form-group">
        <label for="location">Ubicación</label>
        <input
            type="text"
            name="location"
            id="location"
            value="<?= esc($offer['location']) ?>"
            required
        >
    </div>

    <!-- IMAGEN -->
    <div class="form-group">
        <label for="image_url">Imagen (URL)</label>
        <input
            type="text"
            name="image_url"
            id="image_url"
            value="<?= esc($offer['image_url']) ?>"
            placeholder="https://.../imagen.jpg"
        >
    </div>

    <!-- ACCIONES -->
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">
             Actualizar oferta
        </button>

        <a href="/local-offers/my-offers" class="btn btn-secondary">
            ← Volver
        </a>
    </div>

</form>

<?= $this->endSection() ?>