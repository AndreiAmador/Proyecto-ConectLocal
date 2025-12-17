<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1>Nueva Publicación de Servicio</h1>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<form action="/services/store" method="post" class="form card">

    <div class="form-group">
        <label for="title">Título</label>
        <input type="text" name="title" id="title" required placeholder="Ej: Electricista 24/7">
    </div>

    <div class="form-group">
        <label for="category">Categoría</label>
        <select name="category" id="category" required>
            <option value="">Selecciona una categoría</option>
            <option>Electricidad</option>
            <option>Plomería</option>
            <option>Mecánica</option>
            <option>Carpintería</option>
            <option>Jardinería</option>
            <option>Limpieza</option>
            <option>Construcción</option>
            <option>Pintura</option>
            <option>Otro</option>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea name="description" id="description" rows="5" required></textarea>
    </div>

    <div class="form-group">
        <label for="price">Precio (MXN)</label>
        <input type="number" name="price" id="price" step="0.01" min="0" required>
    </div>

    <div class="form-group">
        <label for="image_url">Imagen (URL)</label>
        <input type="text" name="image_url" id="image_url">
    </div>

    <button type="submit" class="btn btn-primary">
        Publicar Servicio
    </button>

</form>

<?= $this->endSection() ?>