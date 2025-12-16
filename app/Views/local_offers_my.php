<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Ofertas Locales</title>
</head>
<body>
    <h1>Mis Ofertas Locales</h1>

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

    <p><a href="/local-offers/create">Crear nueva oferta</a></p>

    <?php if (empty($offers)): ?>
        <p>No has publicado ofertas locales.</p>
    <?php else: ?>
        <?php foreach ($offers as $offer): ?>
            <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px;">
                <h3><?= esc($offer['title']) ?></h3>
                <p><strong>Categoría:</strong> <?= esc($offer['category']) ?></p>
                <p><strong>Descripción:</strong> <?= nl2br(esc($offer['description'])) ?></p>
                <p><strong>Precio:</strong> $<?= number_format($offer['price'], 2) ?> MXN</p>
                <p><strong>Ubicación:</strong> <?= esc($offer['location']) ?></p>
                <?php if ($offer['image_url']): ?>
                    <img src="<?= esc($offer['image_url']) ?>" alt="<?= esc($offer['title']) ?>" style="max-width: 200px;">
                <?php endif; ?>
                <p><small>Publicado: <?= date('d/m/Y', strtotime($offer['created_at'])) ?></small></p>
                <p>
                    <a href="/local-offers/edit/<?= $offer['id'] ?>">Editar</a> | 
                    <a href="/local-offers/delete/<?= $offer['id'] ?>" onclick="return confirm('¿Eliminar esta oferta?')">Eliminar</a>
                </p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="/profile">Volver al perfil</a> | <a href="/">Ver todas las ofertas</a></p>
</body>
</html>