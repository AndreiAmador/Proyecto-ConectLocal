<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// RUTA PRINCIPAL DEL PROYECTO (la oficial)
$routes->get('/', 'Home::index');

/*
|--------------------------------------------------------------------------
| RUTAS TEMPORALES SOLO PARA DISEÑO (DESARROLLO)
|--------------------------------------------------------------------------
| Estas rutas son SOLO para previsualizar el diseño.
| NO deben usarse en producción.
*/

// $routes->get('/preview', 'Preview::index');
// $routes->get('/login', 'Preview::login');
