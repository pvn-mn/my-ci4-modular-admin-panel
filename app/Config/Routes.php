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
    $routes->get('test', 'Dashboard_Controllers::index_test');
});



$routes->group('', ['namespace' => 'Modules\Auth\Controllers'], function($routes) {
    $routes->get('login', 'Auth_Controllers::login');
    $routes->post('login/auth', 'Auth_Controllers::auth');
    // $routes->get('register', 'Auth_Controllers::register');
    // $routes->post('register/auth', 'Auth_Controllers::register');
    $routes->get('logout', 'Auth_Controllers::logout');
});