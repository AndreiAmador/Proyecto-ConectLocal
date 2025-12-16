<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Oferta Local</title>
</head>
<body>
    <h1>Editar Oferta Local</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red; padding: 10px; background: #f8d7da;">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="/local-offers/update/<?= $offer['id'] ?>" method="post">
        <div>
            <label for="title">Título:</label><br>
            <input type="text" name="title" id="title" value="<?= esc($offer['title']) ?>" required>
        </div>
        
        <div>
            <label for="category">Categoría:</label><br>
            <select name="category" id="category" required>
                <option value="Electrónica" <?= $offer['category'] == 'Electrónica' ? 'selected' : '' ?>>Electrónica</option>
                <option value="Ropa" <?= $offer['category'] == 'Ropa' ? 'selected' : '' ?>>Ropa</option>
                <option value="Hogar" <?= $offer['category'] == 'Hogar' ? 'selected' : '' ?>>Hogar</option>
                <option value="Deportes" <?= $offer['category'] == 'Deportes' ? 'selected' : '' ?>>Deportes</option>
                <option value="Alimentos" <?= $offer['category'] == 'Alimentos' ? 'selected' : '' ?>>Alimentos</option>
                <option value="Otros" <?= $offer['category'] == 'Otros' ? 'selected' : '' ?>>Otros</option>
            </select>
        </div>
        
        <div>
            <label for="description">Descripción:</label><br>
            <textarea name="description" id="description" rows="4" required><?= esc($offer['description']) ?></textarea>
        </div>
        
        <div>
            <label for="price">Precio (MXN):</label><br>
            <input type="number" name="price" id="price" step="0.01" min="0" value="<?= $offer['price'] ?>" required>
        </div>
        
        <div>
            <label for="location">Ubicación:</label><br>
            <input type="text" name="location" id="location" value="<?= esc($offer['location']) ?>" required>
        </div>
        
        <div>
            <label for="image_url">Imagen (URL):</label><br>
            <input type="text" name="image_url" id="image_url" value="<?= esc($offer['image_url']) ?>">
        </div>
        
        <button type="submit">Actualizar Oferta</button>
    </form>

    <p><a href="/local-offers/my-offers">Volver a mis ofertas</a></p>
</body>
</html>