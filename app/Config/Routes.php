<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Admin\DashboardController::index');
// route admin dashboard
$routes->get('dashboard', 'Admin\DashboardController::index');
// route admin produk
$routes->get('daftar-produk', 'Admin\ProdukController::index');
// route admin about
$routes->get('about', 'Admin\ProdukController::about');
// route admin accomodation
$routes->get('accommodation', 'Admin\ProdukController::accommodation');
// route admin baju_adat
$routes->get('baju_adat', 'Admin\ProdukController::baju_adat');
// route admin budaya
$routes->get('budaya', 'Admin\ProdukController::budaya');
// route admin pemesanan
$routes->get('pemesanan', 'Admin\ProdukController::pemesanan');
$routes->get('home', 'Admin\ProdukController::home');
// route untuk semua yang ada di pemesanan
$routes->get('wisata', 'Admin\ProdukController::wisata');
$routes->group('admin/produk', function ($routes) {
    $routes->get('add', 'Admin\ProdukController::add');
    $routes->post('save', 'Admin\ProdukController::save');
    $routes->get('edit/(:segment)', 'Admin\ProdukController::edit/$1');
    $routes->post('update', 'Admin\ProdukController::update');
    $routes->get('delete/(:segment)', 'Admin\ProdukController::delete/$1');
    $routes->post('cek', 'Admin\Login::cek');
    
});

$routes->get('login', 'Admin\Login::login');
$routes->get('login2', 'Login2::index');
$routes->get('/login2/register', 'Login2::register');
$routes->post('/login2/save', 'Login2::save');
$routes->post('/login2/proses', 'Login2::proses');
$routes->get('login2/keluar', 'Login2::keluar');
$routes->get('login2/masuk', 'Login2::masuk');
$routes->get('wisata2', 'Wisata::index');
$routes->get('wisata2/pesan/(:segment)','Wisata::pesan/$1');
$routes->post('wisata2/proses', 'Wisata::proses');
$routes->get('wisata2/bayar', 'Wisata::bayar');
$routes->get('wisata2/cek/(:segment)', 'Wisata::cek/$1');
$routes->get('history', 'History::index');
$routes->get('keluar', 'Admin\Login::keluar');
$routes->get('petugas', 'Admin\Petugas::index');
$routes->group('admin/produk/petugas', function ($routes) {
    $routes->get('/', 'Admin\Petugas::index'); // Rute untuk daftar petugas
    $routes->get('add', 'Admin\Petugas::add'); // Rute untuk menambah petugas
    $routes->post('save', 'Admin\Petugas::save'); // Rute untuk menyimpan data
    $routes->get('delete/(:segment)', 'Admin\Petugas::delete/$1');
    $routes->get('edit/(:segment)', 'Admin\Petugas::edit/$1');
    $routes->post('update', 'Admin\Petugas::update'); 
});
$routes->get('member', 'Admin\Member::index');
$routes->get('pesan', 'Admin\Pesan::index');
$routes->get('pesan/settle', 'Admin\Pesan::settle');
$routes->get('admin', 'Admin\ProdukController::admin');
$routes->get('member', 'Admin\ProdukController::member');
$routes->get('order-tiket', 'Admin\ProdukController::order_tiket');
$routes->get('laporan-tiket', 'Admin\ProdukController::laporan_tiket');
// route admin festival
$routes->get('festival', 'Admin\ProdukController::festival');
// route admin gallery
$routes->get('gallery', 'Admin\ProdukController::gallery');
// route admin places
$routes->get('places', 'Admin\ProdukController::places');
// route admin rumah_adat
$routes->get('rumah_adat', 'Admin\ProdukController::rumah_adat');
// route admin tari_tradisional
$routes->get('tari_tradisional', 'Admin\ProdukController::tari_tradisional');
// route admin transportation
$routes->get('transportation', 'Admin\ProdukController::transportation');
// route admin upacara
$routes->get('upacara', 'Admin\ProdukController::upacara');




