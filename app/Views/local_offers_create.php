<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Crear oferta local</h2>

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

<form action="/local-offers/store" method="post" class="card form">

    <div class="form-group">
        <label for="title">Título del producto / servicio</label>
        <input type="text" name="title" id="title" required>
    </div>

    <div class="form-group">
        <label for="category">Categoría</label>
        <select name="category" id="category" required>
            <option value="">Selecciona</option>
            <option value="Electrónica">Electrónica</option>
            <option value="Ropa">Ropa</option>
            <option value="Hogar">Hogar</option>
            <option value="Deportes">Deportes</option>
            <option value="Alimentos">Alimentos</option>
            <option value="Otros">Otros</option>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea name="description" id="description" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label for="price">Precio (MXN)</label>
        <input type="number" name="price" id="price" step="0.01" min="0" required>
    </div>

    <div class="form-group">
        <label for="location">Ubicación</label>
        <input type="text" name="location" id="location" required>
    </div>

    <div class="form-group">
        <label for="image_url">Imagen (URL)</label>
        <input type="text" name="image_url" id="image_url" placeholder="https://...">
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">
            Publicar oferta
        </button>
        <a href="/" class="btn btn-secondary">
            Inicio
        </a>
        <a href="/profile" class="btn btn-secondary">
            Perfil
        </a>
    </div>

</form>

<?= $this->endSection() ?>