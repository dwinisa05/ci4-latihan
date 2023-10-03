<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/my-movie', 'Home::myMovie');



$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');
