<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Trabajo</title>
</head>
<body>
    <h1>Editar Trabajo</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red; padding: 10px; background: #f8d7da; border: 1px solid #f5c6cb;">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="/jobs/update/<?= $job['id'] ?>" method="post">
        <div>
            <label for="job_title">Título del trabajo:</label><br>
            <input type="text" name="job_title" id="job_title" value="<?= esc($job['job_title']) ?>" required>
        </div>
        
        <div>
            <label for="job_image">Imagen (URL):</label><br>
            <input type="text" name="job_image" id="job_image" value="<?= esc($job['job_image']) ?>" placeholder="https://.../foto.jpg">
        </div>
        
        <div>
            <label for="description">Descripción:</label><br>
            <textarea name="description" id="description" rows="4" required><?= esc($job['description']) ?></textarea>
        </div>
        
        <button type="submit">Actualizar Trabajo</button>
    </form>

    <p><a href="/jobs">Volver a la lista de trabajos</a></p>
</body>
</html>
