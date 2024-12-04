<?php

use CodeIgniter\Router\RouteCollection;



$routes->setAutoRoute(true);

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Welcome::index');
$routes->get('/welcome', 'Welcome::index');


// $routes->get('/home', 'Home::index');

// $routes->get('/login', 'Login::index');
// $routes->post('/login/login_post', 'Login::login_post');
// $routes->get('/login/logout', 'Login::logout');
// $routes->post('/login/store', 'Login::store');
// $routes->get('/register', 'Login::create');


// $routes->get('/dashboard/dashboard', 'Dashboard::index');
// $routes->get('/dashboard/index_user', 'UserManagement::index');
// $routes->get('/dashboard/create_user', 'UserManagement::create');
// $routes->post('/dashboard/store_user', 'UserManagement::store');
// $routes->get('/dashboard/edit_user/(:num)', 'UserManagement::edit/$1'); 
// $routes->post('/dashboard/update_user/(:num)', 'UserManagement::update/$1'); 
// $routes->get('/dashboard/delete_user/(:num)', 'UserManagement::delete/$1'); 
// $routes->get('/dashboard/search_user', 'UserManagement::search');


// $routes->get('/dashboard/admins/index_admin', 'AdminManagement::index');
$routes->get('/dashboard/admins/create_admin', 'AdminManagement::create');
$routes->post('/dashboard/admins/store_admin', 'AdminManagement::store');
$routes->get('/dashboard/admins/edit_admin/(:num)', 'AdminManagement::edit/$1'); 
$routes->post('/dashboard/admins/update_admin/(:num)', 'AdminManagement::update/$1'); 
$routes->get('/dashboard/admins/delete_admin/(:num)', 'AdminManagement::delete/$1'); 
$routes->get('/dashboard/admins/search_admin', 'AdminManagement::search');


// $routes->get('/dashboard/index_course', 'CourseManagement::index');
// $routes->get('/dashboard/reports_and_analytics', 'ReportsAndAnalytics::index');
// $routes->get('/dashboard/settings', 'Settings::index');
