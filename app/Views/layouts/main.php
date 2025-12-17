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

    <div class="page-content">
        <?= $this->renderSection('content') ?>
    </div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('warning')): ?>
    <div class="alert alert-warning">
        <?= session()->getFlashdata('warning') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('info')): ?>
    <div class="alert alert-info">
        <?= session()->getFlashdata('info') ?>
    </div>
<?php endif; ?>

</main>

<footer class="footer">

    <!-- cartas de preuba -->
    <div class="card">
    <p>Desarrollado por:</p>
    <p>André San Arce</p>
    <p>Armando Andrei Amador</p>
    <p>Plataforma para conectar servicios y ofertas locales en tu comunidad.</p>
    <p>Desarrollado con CodeIgniter 4 • PHP • MySQL</p>
    
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