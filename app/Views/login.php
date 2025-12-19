<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<title>Iniciar Sesión</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <section class="page-content">

        <h1>Iniciar Sesión</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="card" style="border-color:#ef4444; margin-bottom:24px;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="/auth/loginPost" method="post">

            <div class="form-group">
                <label for="username">Usuario</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    required
                    placeholder="Tu nombre de usuario">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    placeholder="Tu contraseña">
            </div>

            <div style="display:flex; gap:16px; margin-top:32px;">
                <button type="submit" class="btn btn-success">
                    Iniciar Sesión
                </button>

                <a href="/auth/register" class="btn btn-warning">
                    Registrarse
                </a>
            </div>

        </form>

    </section>
</div>

<?= $this->endSection() ?>
