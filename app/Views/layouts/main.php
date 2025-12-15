<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'ConectLocal') ?></title>

    <!-- CSS global -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

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
    <?= $this->renderSection('content') ?>
</main>

<footer class="footer">
    <p>© 2025 ConectLocal · Proyecto escolar</p>
</footer>

<!-- JS global -->
<script src="<?= base_url('js/mouse-trail.js') ?>"></script>

</body>
</html>