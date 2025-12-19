<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<title>Crear Oferta Local</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <section class="page-content">

        <h1>Crear Oferta Local</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="card" style="border-color:#ef4444; margin-bottom:24px;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="card" style="border-color:#22c55e; margin-bottom:24px;">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <div class="card" style="padding:32px;">
            <form action="/local-offers/store" method="post">

                <div class="form-group">
                    <label for="title">Título del producto/servicio</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        required
                        placeholder="Ej: Bicicleta de montaña">
                </div>

                <div class="form-group select-space">
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
                    <span class="select-icon">▾</span>
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        required
                        placeholder="Describe tu producto/servicio, zona, condiciones..."></textarea>
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
                    <label for="location">Ubicación (zona/localidad)</label>
                    <input
                        type="text"
                        name="location"
                        id="location"
                        required
                        placeholder="Ej: Col. Centro, CDMX">
                </div>

                <div class="form-group">
                    <label for="image_url">Imagen (URL)</label>
                    <input
                        type="text"
                        name="image_url"
                        id="image_url"
                        placeholder="https://...">
                </div>

                <div style="display:flex; gap:16px; margin-top:32px;">
                    <button type="submit" class="btn btn-success">
                        Publicar Oferta
                    </button>
                    <a href="/profile" class="btn btn-error">
                        Cancelar
                    </a>
                </div>

            </form>
        </div>

    </section>
</div>

<?= $this->endSection() ?>