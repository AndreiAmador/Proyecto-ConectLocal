<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
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