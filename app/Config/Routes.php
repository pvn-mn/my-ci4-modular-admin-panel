<?php

use CodeIgniter\Router\RouteCollection;
// use Modules\Admin\Controllers\Dashboard_Controllers;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');



// $routes->get('dashboard', 'Modules\Admin\Controllers\Dashboard::index');

$routes->group('', ['namespace' => 'Modules\User\Controllers'], function($routes) {
    $routes->get('dashboard', 'Dashboard_Controllers::index');
    $routes->get('home', 'Dashboard_Controllers::home');
    $routes->get('login-history', 'Dashboard_Controllers::history');
});



$routes->group('', ['namespace' => 'Modules\Auth\Controllers'], function($routes) {
    $routes->get('login', 'Auth_Controllers::login');
    $routes->post('login/auth', 'Auth_Controllers::auth');
    $routes->get('register', 'Auth_Controllers::register');
    $routes->post('register/auth', 'Auth_Controllers::create');
    $routes->get('logout', 'Auth_Controllers::logout');
    $routes->get('edit/(:num)', 'Auth_Controllers::edit/$1');
    $routes->post('update/(:num)', 'Auth_Controllers::update/$1');
});