<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Trabajos</title>
</head>
<body>
    <h1>Mis Trabajos Realizados</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div style="color: green; padding: 10px; background: #d4edda; border: 1px solid #c3e6cb;">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red; padding: 10px; background: #f8d7da; border: 1px solid #f5c6cb;">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <p><a href="/jobs/create">Agregar Nuevo Trabajo</a></p>
    
    <?php if (empty($jobs)): ?>
        <p>No hay trabajos registrados aún.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($jobs as $job): ?>
                <li style="margin-bottom: 20px; padding: 10px; border: 1px solid #ddd;">
                    <h3><?= esc($job['job_title']) ?></h3>
                    
                    <?php if (!empty($job['job_image'])): ?>
                        <p><img src="<?= esc($job['job_image']) ?>" alt="<?= esc($job['job_title']) ?>" style="max-width: 300px;"></p>
                    <?php endif; ?>
                    
                    <p><?= nl2br(esc($job['description'])) ?></p>
                    
                    <p>
                        <small>Agregado: <?= date('d/m/Y', strtotime($job['created_at'])) ?></small>
                    </p>
                    
                    <p>
                        <a href="/jobs/edit/<?= $job['id'] ?>">Editar</a> | 
                        <a href="/jobs/delete/<?= $job['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar este trabajo?')">Eliminar</a>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <p><a href="/profile">Volver al perfil</a></p>
</body>
</html>