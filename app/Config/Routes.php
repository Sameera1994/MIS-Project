<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('add_course', 'Addcourse::index');

$routes->get('course', 'Course::index');
$routes->get('coursemanagement', 'Coursemanagement::index');
$routes->get('course_year1', 'Courseyear1::index');
$routes->get('course_year2', 'Courseyear2::index');
$routes->get('course_year3', 'Courseyear3::index');
$routes->get('course_year4', 'Courseyear4::index');

$routes->post('course/add', 'CourseController::add');



