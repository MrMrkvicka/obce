<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get("index1", "Home::index1");
$routes->get("okres/(:num)", "Home::okres/$1");