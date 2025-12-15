<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Mi Proyecto') ?></title>

    <!-- CSS global -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <header class="header">
        <h1>Mi Proyecto</h1>
        <nav>
            <a href="#">Inicio</a>
            <a href="#">Login</a>
        </nav>
    </header>

    <main class="content">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer">
        <p>© 2025</p>
    </footer>

</body>
</html>