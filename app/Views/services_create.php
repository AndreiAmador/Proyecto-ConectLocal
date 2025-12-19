<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<title>Nueva Publicación</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <section class="page-content">

        <h1>Nueva Publicación de Servicio</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="card" style="border-color:#ef4444; margin-bottom:24px;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="/services/store" method="post">

            <div class="form-group">
                <label for="title">Título</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    required
                    placeholder="Ej: Electricista 24/7">
            </div>

            <div class="form-group select-space">
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

    <span class="select-icon">▾</span>
</div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea
                    name="description"
                    id="description"
                    rows="6"
                    required
                    placeholder="Qué ofreces, zona, garantía, experiencia..."></textarea>
            </div>

            <div class="form-group">
                <label for="price">Precio (MXN)</label>
                <input
                    type="number"
                    name="price"
                    id="price"
                    step="0.01"
                    min="0"
                    required>
            </div>

            <div class="form-group">
                <label for="image_url">Imagen (URL)</label>
                <input
                    type="text"
                    name="image_url"
                    id="image_url"
                    placeholder="https://.../foto.jpg">
            </div>

            <div style="display:flex; gap:16px; margin-top:32px;">
                <button type="submit" class="btn btn-success">
                    Publicar Servicio
                </button>

                <a href="/profile" class="btn btn-error">
                    Cancelar
                </a>
            </div>

        </form>

    </section>
</div>

<?= $this->endSection() ?>