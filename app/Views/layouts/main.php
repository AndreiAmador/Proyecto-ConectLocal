<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'ConectLocal') ?></title>

    <!-- CSS global -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<!-- page-loader -->
<div id="page-loader">
    <div class="spinner"></div>
</div>

<canvas id="stars"></canvas>

<header class="header">
    <div class="container header-content">
        <h1 class="logo">ConectLocal</h1>
        <nav class="nav">
            <a href="/">Inicio</a>
            <a href="/login">Login</a>
        </nav>
    </div>
</header>

<main class="container content">

    <!-- CONTENEDOR DE ALERTAS -->
    <div id="alert-container"></div>

    <?= $this->renderSection('content') ?>

    <!-- BOTONES DE PRUEBA -->
    <div class="card">
        <h3 class="card-title">Pruebas de alertas</h3>

        <button class="btn btn-success" onclick="showAlert('success')">Éxito</button>
        <button class="btn btn-error" onclick="showAlert('error')">Error</button>
        <button class="btn btn-warning" onclick="showAlert('warning')">Advertencia</button>
        <button class="btn btn-info" onclick="showAlert('info')">Información</button>
    </div>

</main>

<footer class="footer">

    <!-- cartas de preuba -->
    <div class="card">
    <h3 class="card-title">Panel informativo</h3>
    <p class="card-text">
        Aquí se mostrará información del sistema.
    </p>
    <button class="btn btn-primary">Acción</button>
    
</div>
    <p>© 2025 ConectLocal · Proyecto escolar</p>
</footer>

<!-- JS global -->
<script src="<?= base_url('js/mouse-trail.js') ?>"></script>

<script src="<?= base_url('js/stars.js') ?>"></script>

<script src="<?= base_url('js/loader.js') ?>"></script>

<script src="<?= base_url('js/alerts.js') ?>"></script>

</body>
</html>