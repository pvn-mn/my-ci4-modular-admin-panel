<?php

use CodeIgniter\Router\RouteCollection;
use Modules\Admin\Controllers\Dashboard;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');



// $routes->get('dashboard', 'Modules\Admin\Controllers\Dashboard::index');

$routes->group('dashboard', ['namespace' => 'Modules\Admin\Controllers'], function($routes) {
    $routes->get('/', 'Dashboard::index');
});
