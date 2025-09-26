<?php

use CodeIgniter\Router\RouteCollection;
use Modules\Admin\Controllers\Dashboard_Controllers;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');



// $routes->get('dashboard', 'Modules\Admin\Controllers\Dashboard::index');

$routes->group('admin', ['namespace' => 'Modules\Admin\Controllers'], function($routes) {
    $routes->get('dashboard', 'Dashboard_Controllers::index');
});



$routes->group('auth', ['namespace' => 'Modules\Auth\Controllers'], function($routes) {
    $routes->get('login', 'Auth_Controllers::login');
    $routes->get('register', 'Auth_Controllers::register');
});
