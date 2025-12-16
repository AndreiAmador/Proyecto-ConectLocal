<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Oferta Local</title>
</head>
<body>
    <h1>Crear Oferta Local</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red; padding: 10px; background: #f8d7da;">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div style="color: green; padding: 10px; background: #d4edda;">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <form action="/local-offers/store" method="post">
        <div>
            <label for="title">Título del producto/servicio:</label><br>
            <input type="text" name="title" id="title" required>
        </div>
        
        <div>
            <label for="category">Categoría:</label><br>
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
        
        <div>
            <label for="description">Descripción:</label><br>
            <textarea name="description" id="description" rows="4" required></textarea>
        </div>
        
        <div>
            <label for="price">Precio (MXN):</label><br>
            <input type="number" name="price" id="price" step="0.01" min="0" required>
        </div>
        
        <div>
            <label for="location">Ubicación (zona/localidad):</label><br>
            <input type="text" name="location" id="location" required>
        </div>
        
        <div>
            <label for="image_url">Imagen (URL):</label><br>
            <input type="text" name="image_url" id="image_url" placeholder="https://...">
        </div>
        
        <button type="submit">Publicar Oferta</button>
    </form>

    <p><a href="/">Volver al inicio</a> | <a href="/profile">Volver al perfil</a></p>
</body>
</html>