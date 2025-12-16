<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Trabajo</title>
</head>
<body>
    <h1>Agregar Trabajo Realizado</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <form action="/jobs/store" method="post">
        <div>
            <label for="job_title">Título del trabajo:</label><br>
            <input type="text" name="job_title" id="job_title" required>
        </div>
        
        <div>
            <label for="job_image">Imagen (URL):</label><br>
            <input type="text" name="job_image" id="job_image" placeholder="https://.../foto.jpg">
        </div>
        
        <div>
            <label for="description">Descripción:</label><br>
            <textarea name="description" id="description" rows="4" required></textarea>
        </div>
        
        <button type="submit">Guardar Trabajo</button>
    </form>

    <p><a href="/jobs">Volver a la lista de trabajos</a></p>
</body>
</html>