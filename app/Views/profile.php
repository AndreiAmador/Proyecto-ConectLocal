<h1>Mi Perfil</h1>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if (!empty($profile['photo'])): ?>
    <img src="<?= base_url($profile['photo']) ?>" style="max-width: 200px;">
<?php endif; ?>

<p><strong>Biografía:</strong> <?= esc($profile['bio']) ?></p>
<p><strong>Teléfono:</strong> <?= esc($profile['phone']) ?></p>
<p><strong>Enlace social:</strong> <a href="<?= esc($profile['social_link']) ?>"><?= esc($profile['social_link']) ?></a></p>

<a href="/profile/edit">Editar perfil</a>
<a href="/auth/logout">Cerrar sesión</a>
<!-- En cualquier parte de tu profile.php -->
<p><a href="/jobs">Ver y gestionar mi currículum (trabajos realizados)</a></p>