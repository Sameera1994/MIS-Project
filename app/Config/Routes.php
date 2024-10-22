<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Welcome::index');
$routes->get('/welcome', 'Welcome::index');


$routes->get('/home', 'Home::index');

$routes->get('/login', 'Login::index');

// $routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/index_user', 'UserManagement::index');
$routes->get('/dashboard/create_user', 'UserManagement::create');
$routes->post('/dashboard/store_user', 'UserManagement::store');
$routes->get('/dashboard/edit_user/(:num)', 'UserManagement::edit/$1'); 
$routes->post('/dashboard/update_user/(:num)', 'UserManagement::update/$1'); 
$routes->get('/dashboard/delete_user/(:num)', 'UserManagement::delete/$1'); 


$routes->get('/dashboard/course_management', 'CourseManagement::index');
$routes->get('/dashboard/reports_and_analytics', 'ReportsAndAnalytics::index');
$routes->get('/dashboard/settings', 'Settings::index');
