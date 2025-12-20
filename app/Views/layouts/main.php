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

<!-- Fondo de estrellas -->
<canvas id="stars"></canvas>

<header class="header">
    <div class="container header-content">
        <h1 class="logo">ConectLocal</h1>

        <nav class="nav">
            <a href="/" class="btn btn-warning">Inicio</a>

            <?php if (session()->get('loggedIn')): ?>
                <a href="/profile" class="btn btn-info">Mi perfil</a>
                <a href="/auth/logout" class="btn btn-error">Cerrar sesión</a>
            <?php else: ?>
                <a href="/auth/login" class="btn btn-info">Iniciar sesión</a>
                <a href="/auth/register" class="btn btn-success">Registrarse</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
<!-- Progreso -->
<script>
    const bar = document.querySelector('.scroll-bar');

    window.addEventListener('scroll', () => {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;

        if (docHeight <= 0) return;

        const progress = (scrollTop / docHeight) * 100;
        bar.style.width = progress + '%';
    });
</script>

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
    <p>Desarrollado por:</p>
    <p>André San Arce</p>
    <p>Armando Andrei Amador</p>
    <p>Plataforma para conectar servicios y ofertas locales en tu comunidad.</p>
    <p>Desarrollado con CodeIgniter 4 • PHP • MySQL</p>
    <p>© 2025 ConectLocal · Proyecto escolar</p>
</footer>

<!-- BOTÓN VOLVER ARRIBA -->
<button id="backToTop" aria-label="Volver arriba">⬆</button>

<!-- JS GLOBAL (ORDEN IMPORTANTE) -->
<script src="<?= base_url('js/mouse-trail.js') ?>"></script>
<script src="<?= base_url('js/stars.js') ?>"></script>
<script src="<?= base_url('js/loader.js') ?>"></script>
<script src="<?= base_url('js/alerts.js') ?>"></script>
<script src="<?= base_url('js/backToTop-secret.js') ?>"></script>
<script src="<?= base_url('js/modal.js') ?>"></script>

<!-- JS Back To Top (solo scroll y visibilidad) -->
<script>
const backToTop = document.getElementById('backToTop');

window.addEventListener('scroll', () => {
    backToTop.classList.toggle('show', window.scrollY > 300);
});

backToTop.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});
</script>
<div id="card-overlay">
    <div id="card-modal"></div>
</div>

<script src="<?= base_url('js/modal.js') ?>"></script>

</body>
</html>