<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<title>Editar Oferta Local</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <section class="page-content">

        <h1>Editar Oferta Local</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="card" style="border-color:#ef4444; margin-bottom:24px;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="card" style="padding:32px;">
            <form action="/local-offers/update/<?= $offer['id'] ?>" method="post">

                <div class="form-group">
                    <label for="title">Título</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="<?= esc($offer['title']) ?>"
                        required>
                </div>

                <div class="form-group select-space">
                    <label for="category">Categoría</label>
                    <select name="category" id="category" required>
                        <option value="Electrónica" <?= $offer['category'] == 'Electrónica' ? 'selected' : '' ?>>Electrónica</option>
                        <option value="Ropa" <?= $offer['category'] == 'Ropa' ? 'selected' : '' ?>>Ropa</option>
                        <option value="Hogar" <?= $offer['category'] == 'Hogar' ? 'selected' : '' ?>>Hogar</option>
                        <option value="Deportes" <?= $offer['category'] == 'Deportes' ? 'selected' : '' ?>>Deportes</option>
                        <option value="Alimentos" <?= $offer['category'] == 'Alimentos' ? 'selected' : '' ?>>Alimentos</option>
                        <option value="Otros" <?= $offer['category'] == 'Otros' ? 'selected' : '' ?>>Otros</option>
                    </select>
                    <span class="select-icon">▾</span>
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        required><?= esc($offer['description']) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="price">Precio (MXN)</label>
                    <input
                        type="number"
                        name="price"
                        id="price"
                        step="0.01"
                        min="0"
                        value="<?= $offer['price'] ?>"
                        required>
                </div>

                <div class="form-group">
                    <label for="location">Ubicación</label>
                    <input
                        type="text"
                        name="location"
                        id="location"
                        value="<?= esc($offer['location']) ?>"
                        required>
                </div>

                <div class="form-group">
                    <label for="image_url">Imagen (URL)</label>
                    <input
                        type="text"
                        name="image_url"
                        id="image_url"
                        value="<?= esc($offer['image_url']) ?>">
                </div>

                <div style="display:flex; gap:16px; margin-top:32px;">
                    <button type="submit" class="btn btn-success">
                        Actualizar Oferta
                    </button>
                    <a href="/local-offers/my-offers" class="btn btn-error">
                        Cancelar
                    </a>
                </div>

            </form>
        </div>

    </section>
</div>

<?= $this->endSection() ?>