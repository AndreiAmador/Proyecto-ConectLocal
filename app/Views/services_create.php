<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Publicación</title>
</head>
<body>
    <h1>Nueva Publicación de Servicio</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red; padding: 10px; background: #f8d7da;">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="/services/store" method="post">
        <div>
            <label for="title">Título:</label><br>
            <input type="text" name="title" id="title" required placeholder="Ej: Electricista 24/7">
        </div>
        
        <div>
            <label for="category">Categoría:</label><br>
            <select name="category" id="category" required>
                <option value="">Selecciona una categoría</option>
                <option value="Electricidad">Electricidad</option>
                <option value="Plomería">Plomería</option>
                <option value="Mecánica">Mecánica</option>
                <option value="Carpintería">Carpintería</option>
                <option value="Jardinería">Jardinería</option>
                <option value="Limpieza">Limpieza</option>
                <option value="Construcción">Construcción</option>
                <option value="Pintura">Pintura</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
        
        <div>
            <label for="description">Descripción:</label><br>
            <textarea name="description" id="description" rows="6" required 
                      placeholder="Qué ofreces, zona, garantía, experiencia..."></textarea>
        </div>
        
        <div>
            <label for="price">Precio (MXN):</label><br>
            <input type="number" name="price" id="price" step="0.01" min="0" required>
        </div>
        
        <div>
            <label for="image_url">Imagen (URL):</label><br>
            <input type="text" name="image_url" id="image_url" placeholder="https://.../foto.jpg">
        </div>
        
        <button type="submit">Publicar Servicio</button>
    </form>

    <p><a href="/">Volver al inicio</a> | <a href="/profile">Volver al perfil</a></p>
</body>
</html>