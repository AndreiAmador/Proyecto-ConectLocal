<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<title>Editar Trabajo</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <section class="page-content">

        <h1>Editar Trabajo</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="card" style="border-color:#ef4444; margin-bottom:24px; padding:16px;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="card" style="padding:24px;">
            <form action="/jobs/update/<?= $job['id'] ?>" method="post">

                <div class="form-group">
                    <label for="job_title">Título del trabajo</label>
                    <input
                        type="text"
                        name="job_title"
                        id="job_title"
                        value="<?= esc($job['job_title']) ?>"
                        required
                        placeholder="Ej: Diseño de sitio web">
                </div>

                <div class="form-group">
                    <label for="job_image">Imagen (URL)</label>
                    <input
                        type="text"
                        name="job_image"
                        id="job_image"
                        value="<?= esc($job['job_image']) ?>"
                        placeholder="https://.../foto.jpg">
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        required
                        placeholder="Detalles sobre el trabajo realizado"><?= esc($job['description']) ?></textarea>
                </div>

                <div style="display:flex; gap:16px; margin-top:24px;">
                    <button type="submit" class="btn btn-success">Actualizar Trabajo</button>
                    <a href="/jobs" class="btn btn-error">Cancelar</a>
                </div>

            </form>
        </div>

    </section>
</div>

<?= $this->endSection() ?>
