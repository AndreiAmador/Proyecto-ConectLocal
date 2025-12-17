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

<p>
    <a href="/profile/edit">Editar perfil</a> 
    
</p>

<hr>

<!-- Sección de Ofertas Locales -->
<h2>Ofertas Locales</h2>
<p><a href="/local-offers/create">Publicar nueva oferta local</a></p>
<p><a href="/local-offers/my-offers">Gestionar mis ofertas</a></p>

<hr>

<!-- Sección de CV/Trabajos -->
<h2>Mi Currículum</h2>
<p><a href="/jobs/create">Agregar nuevo trabajo</a></p>
<p><a href="/jobs">Ver y gestionar mi currículum</a></p>

<hr>

<!-- Sección de Servicios -->
<h2>Servicios Publicados</h2>
<p><a href="/services/create">Publicar nuevo servicio</a></p>
<p><a href="/services/my-posts">Gestionar mis publicaciones</a></p>