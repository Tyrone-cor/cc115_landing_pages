<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('landing', 'Home::landing');
$routes->get('home/search', 'Home::search');

// Admin routes
$routes->post('admin/verify', 'Admin::verify');
$routes->post('admin/addProject', 'Admin::addProject');
$routes->post('admin/updateProject', 'Admin::updateProject');
$routes->post('admin/deleteProject', 'Admin::deleteProject');
$routes->get('admin/projects', 'Admin::getProjects');
$routes->get('admin/projects/(:num)', 'Admin::getProject/$1');






