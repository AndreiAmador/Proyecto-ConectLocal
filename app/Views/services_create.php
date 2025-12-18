<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="form-container">

    <h1 class="page-title">Nueva Publicación de Servicio</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="/services/store" method="post" class="card form service-form">

        <div class="form-group">
            <label for="title">Título del servicio</label>
            <input
                type="text"
                name="title"
                id="title"
                placeholder="Ej: Electricista 24/7"
                required
            >
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
            <textarea
                name="description"
                id="description"
                rows="5"
                placeholder="Describe tu servicio, experiencia y disponibilidad"
                required
            ></textarea>
        </div>

        <div class="form-group">
            <label for="price">Precio (MXN)</label>
            <input
                type="number"
                name="price"
                id="price"
                step="0.01"
                min="0"
                placeholder="Ej: 350.00"
                required
            >
        </div>

        <div class="form-group">
            <label for="image_url">Imagen (URL)</label>
            <input
                type="text"
                name="image_url"
                id="image_url"
                placeholder="https://ejemplo.com/imagen.jpg"
            >
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success btn-block">
                Publicar servicio
            </button>

            <a href="/profile" class="btn btn-secondary btn-block">
                Cancelar
            </a>
        </div>

    </form>

</div>

<?= $this->endSection() ?>