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
$routes->get('/dashboard/user_management', 'UserManagement::index');


$routes->get('/dashboard/user_management/user_form', 'UserForm::index');
$routes->post('/dashboard/user_management/user_form', 'UserForm::post_user');
$routes->post('/dashboard/user_management/user_form', 'UserForm::edit_user');
$routes->delete('/dashboard/user_management/user_form', 'UserForm::delete_user');


$routes->get('/dashboard/course_management', 'CourseManagement::index');
$routes->get('/dashboard/reports_and_analytics', 'ReportsAndAnalytics::index');
$routes->get('/dashboard/settings', 'Settings::index');
