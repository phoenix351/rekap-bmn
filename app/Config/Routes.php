<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/anggaran', 'Anggaran::index');
$routes->get('/klaim', 'Klaim::index');
$routes->get('/item', 'Item::index');

$routes->get('/rekap', 'Rekap::index');
$routes->get('/item/get_user_by_id', 'Item::get_user_by_id');
$routes->post('/item', 'Item::insert');
$routes->post('/item/delete','Item::delete');
$routes->post('/item/update','Item::update');
$routes->get('/item/get-item-by-userid','Item::get_item_by_userid');

$routes->get('/item/get-item','Item::get_item_by_id');

$routes->get('/anggaran/get-anggaran','Anggaran::get_anggaran_by_id');
$routes->post('/anggaran/insert','Anggaran::insert');

$routes->post('/anggaran/update','Anggaran::update');
$routes->post('/anggaran/delete','Anggaran::delete');
$routes->post('/anggaran/generate','Anggaran::generate');
$routes->get('/anggaran/generate','Anggaran::generate');


$routes->get('/anggaran/get-anggaran-by-itemid','Anggaran::get_anggaran_by_itemid');

$routes->get('/klaim/get-item','Klaim::get_item_by_id');
$routes->get('/anggaran/get-anggaran-by-item-and-tahun','Anggaran::get_anggaran_by_item_and_tahun');

$routes->post('/klaim/insert','Klaim::insert');
$routes->get('/klaim/get-summary-cetak','Klaim::summary_cetak');
$routes->get('/klaim/cetak-surat-pengantar','Klaim::cetak_surat_pengantar');
$routes->get('/klaim/surat-pengantar','Klaim::surat_pengantar');


$routes->get('/rekap/get-rekap-tahun','Rekap::get_rekap_tahun');
$routes->get('/rekap/get-rekap-tahun-item','Rekap::get_rekap_tahun_item');










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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}