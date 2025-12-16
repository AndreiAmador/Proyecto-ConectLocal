<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Servicios Disponibles</title>
</head>
<body>
    <h1>Servicios Disponibles</h1>

    <!-- Mensajes de éxito o error -->
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

    <!-- Enlaces de acción para usuarios logueados -->
    <?php if (session()->get('loggedIn')): ?>
        <p><a href="/services/create">Publicar un nuevo servicio</a></p>
        <p><a href="/services/my-posts">Ver mis publicaciones</a></p>
    <?php endif; ?>

    <!-- Listado de servicios -->
    <?php if (empty($posts)): ?>
        <p>No hay servicios publicados aún.</p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
                <h3><?= esc($post['title']) ?></h3>
                <p><strong>Categoría:</strong> <?= esc($post['category']) ?></p>
                <p><strong>Descripción:</strong> <?= nl2br(esc($post['description'])) ?></p>
                <p><strong>Precio:</strong> $<?= number_format($post['price'], 2) ?> MXN</p>
                <?php if ($post['image_url']): ?>
                    <img src="<?= esc($post['image_url']) ?>" alt="<?= esc($post['title']) ?>" style="max-width: 300px;">
                <?php endif; ?>
                <p><small>Publicado por: <?= esc($post['username'] ?? 'Usuario') ?> | 
                   <?= date('d/m/Y', strtotime($post['created_at'])) ?></small></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Enlaces de perfil y cierre de sesión para usuarios logueados -->
    <?php if (session()->get('loggedIn')): ?>
        <p><a href="/profile">Mi perfil</a> | <a href="/auth/logout">Cerrar sesión</a></p>
    <?php else: ?>
        <p><a href="/auth/login">Iniciar sesión</a> | <a href="/auth/register">Registrarse</a></p>
    <?php endif; ?>

    <!-- Sección de ofertas locales -->
    <h2>Ofertas Locales</h2>
    <?php if (empty($offers)): ?>
        <p>No hay ofertas locales publicadas aún.</p>
    <?php else: ?>
        <?php foreach ($offers as $offer): ?>
            <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px;">
                <h3><?= esc($offer['title']) ?></h3>
                <p><strong>Categoría:</strong> <?= esc($offer['category']) ?></p>
                <p><strong>Descripción:</strong> <?= esc($offer['description']) ?></p>
                <p><strong>Precio:</strong> $<?= number_format($offer['price'], 2) ?> MXN</p>
                <p><strong>Ubicación:</strong> <?= esc($offer['location']) ?></p>
                <?php if ($offer['image_url']): ?>
                    <img src="<?= esc($offer['image_url']) ?>" style="max-width: 300px;">
                <?php endif; ?>
                <p><small>Publicado por: <?= esc($offer['username']) ?></small></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>
