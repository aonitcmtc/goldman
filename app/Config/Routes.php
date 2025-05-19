<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/v1', 'Apiv1::index');
$routes->get('/v1/(:any)', 'Apiv1::service/$1');

$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
// $routes->get('dashboard', function() {
//     if (!session()->get('isLoggedIn')) return redirect()->to('/home/index');
//     echo "Welcome, " . session()->get('username');
// });

$routes->get('/lfdrive', 'Lfdrive::index');
$routes->get('/lfdrive/page', 'Lfdrive::page');
$routes->get('/lfdrive/upload/uploadimg', 'Lfdrive::uploadimg');
$routes->get('/lfdrive/upload/showimg', 'Lfdrive::showimg');
$routes->post('/lfdrive/uploadimgtobucket', 'Lfdrive::uploadimgtobucket');


$routes->get('/adminpage', 'Adminpage::index');

$routes->get('/adminmember', 'Adminmember::index');
$routes->get('/adminmember/manage', 'Adminmember::manage');


$routes->get('/cats', 'Cats::index');
$routes->get('/cats/greet/(:any)', 'Cats::greet/$1');

$routes->get('/members', 'Member::index');
$routes->get('/members/(:num)', 'Member::detail/$1');
