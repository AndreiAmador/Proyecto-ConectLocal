<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<title>Registro de Usuario</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <section class="page-content">

        <h1>Registro de Usuario</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="card" style="border-color:#ef4444; margin-bottom:24px;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="/auth/registerPost" method="post">

            <div class="form-group">
                <label for="username">Usuario</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    required
                    placeholder="Nombre de usuario">
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    required
                    placeholder="correo@ejemplo.com">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    placeholder="Escribe tu contraseña">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirmar contraseña</label>
                <input
                    type="password"
                    name="confirm_password"
                    id="confirm_password"
                    required
                    placeholder="Repite tu contraseña">
            </div>

            <div style="display:flex; gap:16px; margin-top:32px;">
                <button type="submit" class="btn btn-success">
                    Registrar
                </button>

                <a href="/auth/login" class="btn btn-info">
                    Volver al login
                </a>
            </div>

        </form>

    </section>
</div>

<?= $this->endSection() ?>
