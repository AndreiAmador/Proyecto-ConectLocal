<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Publicación</title>
</head>
<body>
    <h1>Editar Publicación</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red; padding: 10px; background: #f8d7da;">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="/services/update/<?= $post['id'] ?>" method="post">
        <div>
            <label for="title">Título:</label><br>
            <input type="text" name="title" id="title" value="<?= esc($post['title']) ?>" required>
        </div>
        
        <div>
            <label for="category">Categoría:</label><br>
            <select name="category" id="category" required>
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
        </div>
        
        <div>
            <label for="description">Descripción:</label><br>
            <textarea name="description" id="description" rows="6" required><?= esc($post['description']) ?></textarea>
        </div>
        
        <div>
            <label for="price">Precio (MXN):</label><br>
            <input type="number" name="price" id="price" step="0.01" min="0" value="<?= $post['price'] ?>" required>
        </div>
        
        <div>
            <label for="image_url">Imagen (URL):</label><br>
            <input type="text" name="image_url" id="image_url" value="<?= esc($post['image_url']) ?>" placeholder="https://.../foto.jpg">
        </div>
        
        <button type="submit">Actualizar Publicación</button>
    </form>

    <p><a href="/services/my-posts">Volver a mis publicaciones</a></p>
</body>
</html>