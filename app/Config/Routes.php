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