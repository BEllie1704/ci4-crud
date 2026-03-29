<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('students', 'StudentController::index');
$routes->get('students/create', 'StudentController::create');
$routes->post('students/store', 'StudentController::store');
$routes->get('students/delete/(:num)', 'StudentController::delete/$1');
$routes->resource('api/students', ['controller' => 'Api\StudentApi']);
