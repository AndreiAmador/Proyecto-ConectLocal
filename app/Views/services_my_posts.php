<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Publicaciones</title>
</head>
<body>
    <h1>Mis Publicaciones de Servicios</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div style="color: green; padding: 10px; background: #d4edda;">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red; padding: 10px; background: #f8d7da;">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <p><a href="/services/create">Crear nueva publicación</a></p>

    <?php if (empty($posts)): ?>
        <p>No has publicado ningún servicio aún.</p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px;">
                <h3><?= esc($post['title']) ?></h3>
                <p><strong>Categoría:</strong> <?= esc($post['category']) ?></p>
                <p><strong>Descripción:</strong> <?= nl2br(esc($post['description'])) ?></p>
                <p><strong>Precio:</strong> $<?= number_format($post['price'], 2) ?> MXN</p>
                <?php if ($post['image_url']): ?>
                    <img src="<?= esc($post['image_url']) ?>" alt="<?= esc($post['title']) ?>" style="max-width: 200px;">
                <?php endif; ?>
                <p><small>Publicado: <?= date('d/m/Y', strtotime($post['created_at'])) ?></small></p>
                <p>
                    <a href="/services/edit/<?= $post['id'] ?>">Editar</a> | 
                    <a href="/services/delete/<?= $post['id'] ?>" onclick="return confirm('¿Eliminar esta publicación?')">Eliminar</a>
                </p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="/profile">Volver al perfil</a> | <a href="/">Ver todas las publicaciones</a></p>
    <a href="/services/edit/<?= $post['id'] ?>">Editar</a>
<a href="/services/delete/<?= $post['id'] ?>">Eliminar</a>
</body>
</html>