<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// RUTA PRINCIPAL DEL PROYECTO (la oficial)
$routes->get('/', 'Home::index');
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/loginPost', 'Auth::loginPost');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/registerPost', 'Auth::registerPost');
$routes->get('profile', 'Auth::profile');
$routes->get('profile/edit', 'Auth::editProfile');
$routes->post('profile/edit', 'Auth::saveProfile');



// O si prefieres rutas simples (sin /api)
$routes->get('jobs', 'Jobs::index');                      // GET /jobs
$routes->get('jobs/(:num)', 'Jobs::show/$1');             // GET /jobs/1
$routes->post('jobs', 'Jobs::create');                    // POST /jobs
$routes->post('jobs/update/(:num)', 'Jobs::update/$1');   // POST /jobs/update/1
$routes->get('jobs/delete/(:num)', 'Jobs::delete/$1');    // GET /jobs/delete/1
$routes->get('users/(:num)/jobs', 'Jobs::publicJobs/$1'); // GET /users/1/jobs
$routes->get('/jobs', 'Jobs::index');                    // Ver lista de trabajos
$routes->get('/jobs/create', 'Jobs::create');            // Ver formulario de creación
$routes->post('/jobs/store', 'Jobs::store');             // Guardar trabajo (POST)
$routes->get('/jobs/edit/(:num)', 'Jobs::edit/$1');      // Ver formulario de edición
$routes->post('/jobs/update/(:num)', 'Jobs::update/$1'); // Actualizar trabajo
$routes->get('/jobs/delete/(:num)', 'Jobs::delete/$1');  // Eliminar trabajo

// Asegúrate de tener estas rutas:
$routes->get('/services/create', 'Services::create');       // GET: muestra formulario
$routes->post('/services/store', 'Services::store');        // POST: procesa formulario
$routes->get('/services/my-posts', 'Services::myPosts');    // GET: muestra mis publicaciones
$routes->get('/services/edit/(:num)', 'Services::edit/$1'); // GET: muestra formulario editar
$routes->post('/services/update/(:num)', 'Services::update/$1'); // POST: procesa edición
$routes->get('/services/delete/(:num)', 'Services::delete/$1');  // GET: elimina publicación

// Rutas para ofertas locales
$routes->get('/local-offers/create', 'LocalOffers::create');
$routes->post('/local-offers/store', 'LocalOffers::store');
$routes->get('/local-offers/my-offers', 'LocalOffers::myOffers');
$routes->get('/local-offers/edit/(:num)', 'LocalOffers::edit/$1');
$routes->post('/local-offers/update/(:num)', 'LocalOffers::update/$1');
$routes->get('/local-offers/delete/(:num)', 'LocalOffers::delete/$1');

/*
|--------------------------------------------------------------------------
| RUTAS TEMPORALES SOLO PARA DISEÑO (DESARROLLO)
|--------------------------------------------------------------------------
| Estas rutas son SOLO para previsualizar el diseño.
| NO deben usarse en producción.
*/

// $routes->get('/preview', 'Preview::index');
// $routes->get('/login', 'Preview::login');
