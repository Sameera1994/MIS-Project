<?php

use CodeIgniter\Router\RouteCollection;



$routes->setAutoRoute(true);

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Welcome::index');
$routes->get('/welcome', 'Welcome::index');

$routes->get('settings', 'Settings::index');
$routes->post('settings/updateProfile', 'Settings::updateProfile');
$routes->post('settings/uploadProfileImage', 'Settings::uploadProfileImage');

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

$routes->get('/courses/create_department', 'Courses::create_department');
$routes->get('/courses/delete_department/(:num)', 'Courses::delete_department/$1');
$routes->get('courses/search_department', 'Courses::search_department');

$routes->get('courses/edit_department/(:num)', 'Courses::edit_department/$1');
$routes->post('courses/update_department/(:num)', 'Courses::update_department/$1');


$routes->get('courses/add_new_syllabus/(:num)', 'Courses::add_new_syllabus/$1');
$routes->post('courses/store_syllabus/(:num)', 'Courses::store_syllabus/$1');

$routes->post('courses/store_syllabus', 'Courses::store_syllabus');
$routes->get('courses/delete_syllabus/(:num)/(:num)', 'Courses::delete_syllabus/$1/$2');
$routes->get('courses/department_syllabus/(:num)', 'Courses::department_syllabus/$1');

$routes->get('courses/edit_syllabus/(:num)/(:num)', 'Courses::edit_syllabus/$1/$2');
$routes->post('courses/update_syllabus/(:num)/(:num)', 'Courses::update_syllabus/$1/$2');

$routes->get('courses/add_subject/(:num)/(:num)', 'Courses::add_subject/$1/$2');
$routes->delete('courses/delete_subject/(:num)', 'Courses::delete_subject/$1');

$routes->get('courses/edit_subject/(:num)', 'Courses::edit_subject/$1'); // Route to show the edit form for a specific subject
$routes->post('courses/update_subject/(:num)', 'Courses::update_subject/$1'); // Route to handle the update of the subject
$routes->delete('courses/delete_subject/(:num)', 'Courses::delete_subject/$1'); // Route to handle subject deletion
// $routes->get('/dashboard/index_course', 'CourseManagement::index');
// $routes->get('/dashboard/reports_and_analytics', 'ReportsAndAnalytics::index');
// $routes->get('/dashboard/settings', 'Settings::index');


$routes->get('courses/view_slides/(:num)', 'Courses::view_slides/$1'); // View slides for a subject
$routes->get('courses/add_slide/(:num)', 'Courses::add_slide/$1'); // Add a new slide for a subject
$routes->post('courses/save_slide', 'Courses::save_slide'); // Save a new slide
$routes->get('courses/edit_slide/(:num)', 'Courses::edit_slide/$1'); // Edit a slide
$routes->post('courses/update_slide/(:num)', 'Courses::update_slide/$1'); // Update a slide
$routes->delete('courses/delete_slide/(:num)', 'Courses::delete_slide/$1'); // Delete a slide



$routes->get('courses/download_slide/(:any)', 'Courses::download_slide/$1');






$routes->get('add_course', 'Addcourse::index');
$routes->get('Home', 'Homepage::index');

$routes->get('course', 'Course::index');
$routes->get('coursemanagement', 'Coursemanagement::index');
$routes->get('course_year1', 'Courseyear1::index');
$routes->get('course_year2', 'Courseyear2::index');
$routes->get('course_year3', 'Courseyear3::index');
$routes->get('course_year4', 'Courseyear4::index');

$routes->get('/courses', 'CourseController::display');
$routes->post('/delete_course', 'CourseController::delete');
$routes->get('search_courses', 'CourseController::search');




$routes->post('course/add', 'CourseController::add');
