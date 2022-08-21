<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index', ['filter' => 'auth_login']);

$routes->get('/login', 'Login::index', ['filter' => 'auth_login']);
$routes->add('/login/(:any)', 'Login::$1',['filter' => 'auth_login']);

$routes->get('/administrator', 'Administrator::index', ['filter' => 'auth_admin']);
$routes->add('/administrator/(:any)', 'Administrator::$1', ['filter' => 'auth_admin']);

$routes->get('/pendataan', 'Pendataan::index', ['filter' => 'auth_pendataan']);
$routes->add('/pendataan/(:any)', 'Pendataan::$1', ['filter' => 'auth_pendataan']);

$routes->get('/pengecekan', 'Pengecekan::index', ['filter' => 'auth_pengecekan']);
$routes->add('/pengecekan/(:any)', 'Pengecekan::$1', ['filter' => 'auth_pengecekan']);

$routes->get('/pengadaan', 'Pengadaan::index', ['filter' => 'auth_pengadaan']);
$routes->add('/pengadaan/(:any)', 'Pengadaan::$1', ['filter' => 'auth_pengadaan']);

$routes->get('/umum', 'Umum::index', ['filter' => 'auth_umum']);
$routes->add('/umum/(:any)', 'Umum::$1', ['filter' => 'auth_umum']);

$routes->get('/admin', 'Admin::index');
$routes->add('/admin/(:any)', 'Admin::$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
