<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->get('/', 'Pages::index');
$routes->get('/allproducts', 'Pages::allProducts');
$routes->get('/product/(:any)', 'Pages::product/$1');
$routes->get('/about', 'Pages::about');
$routes->get('/search', 'Pages::search');

// Cart
$routes->get('/cart', 'Cart::index/$1');
$routes->post('/cart/insert', 'Cart::insert', ['filter' => 'role:admin,staff,user']);
$routes->post('/cart/update/(:num)', 'Cart::update/$1', ['filter' => 'role:admin,staff,user']);
$routes->get('/cart/delete/(:num)', 'Cart::delete/$1', ['filter' => 'role:admin,staff,user']);

// Checkout
$routes->get('/checkout', 'Checkout::index', ['filter' => 'role:admin,staff,user']);
$routes->post('/checkout/insert', 'Checkout::insert', ['filter' => 'role:admin,staff,user']);

// Auth
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');

// Admin Routes
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin,staff']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin,staff']);

// Products Routes
$routes->get('/products', 'products::index', ['filter' => 'role:admin,staff']);
$routes->get('/products/index', 'products::index', ['filter' => 'role:admin,staff']);
$routes->get('/products/insert', 'products::insert', ['filter' => 'role:admin,staff']);
$routes->post('/products/save', 'products::save', ['filter' => 'role:admin,staff']);
$routes->get('/products/edit/(:any)', 'products::edit/$1', ['filter' => 'role:admin,staff']);
$routes->post('/products/update/(:num)', 'products::update/$1', ['filter' => 'role:admin,staff']);
$routes->delete('/products/delete/(:num)', 'products::delete/$1', ['filter' => 'role:admin,staff']);
$routes->get('/products/checkstock/(:num)/(:num)', 'products::checkStock/$1/$2');

// Categories Routes
$routes->get('/categories', 'categories::index', ['filter' => 'role:admin,staff']);
$routes->get('/categories/index', 'categories::index', ['filter' => 'role:admin,staff']);
$routes->post('/categories/insert', 'categories::insert', ['filter' => 'role:admin,staff']);
$routes->delete('/categories/delete/(:num)', 'categories::delete/$1', ['filter' => 'role:admin,staff']);

// Profile
$routes->get('/profile', 'Pages::myprofile', ['filter' => 'role:admin,staff,user']);
$routes->get('/updateProfile/(:any)', 'Pages::updateProfile/$1', ['filter' => 'role:admin,staff,user']);
$routes->get('/changePassword', 'Pages::changePassword', ['filter' => 'role:admin,staff']);
$routes->post('/user/updateProfile/(:num)', 'Profile::updateProfile/$1', ['filter' => 'role:admin,staff,user']);

// Forgot Password
$routes->get('/forgot', 'Profile::forgotPassword');

// Reset Password
$routes->get('/reset-password', 'Profile::resetPassword');

// Change Password
$routes->post('/changePassword', 'Profile::changePassword', ['filter' => 'role:admin,staff,user']);

// Order
$routes->get('/orders', 'OrderController::index', ['filter' => 'role:admin,staff,user']);
$routes->get('/orderDetail/(:any)', 'OrderController::orderDetail/$1', ['filter' => 'role:admin,staff,user']);
$routes->get('/orders/delete/(:num)', 'OrderController::delete/$1', ['filter' => 'role:admin,staff,user']);
$routes->get('/history/(:any)', 'OrderController::history/$1', ['filter' => 'role:admin,staff,user']);
$routes->get('/historyDetail/(:any)', 'OrderController::historyDetail/$1', ['filter' => 'role:admin,staff,user']);
$routes->post('/order/updateStatus/(:num)', 'OrderController::updateStatus/$1', ['filter' => 'role:admin,staff,user']);

// Order List
$routes->get('/orderLists', 'OrderAdminController::index', ['filter' => 'role:admin,staff']);
$routes->get('/orderLists/detail/(:any)', 'OrderAdminController::detail/$1', ['filter' => 'role:admin,staff']);
$routes->post('/orderList/updateStatus/(:num)', 'OrderAdminController::updateStatus/$1', ['filter' => 'role:admin,staff']);

// Option
$routes->get('/options', 'OptionsAdminController::index', ['filter' => 'role:admin,staff']);
$routes->post('/options/insert', 'OptionsAdminController::insert', ['filter' => 'role:admin,staff']);
$routes->delete('/options/delete/(:num)', 'OptionsAdminController::delete/$1', ['filter' => 'role:admin,staff']);

// Inventory
$routes->get('/inventory', 'InventoryAdminController::index', ['filter' => 'role:admin,staff']);
$routes->post('/inventory/insert', 'InventoryAdminController::insert', ['filter' => 'role:admin,staff']);
$routes->post('/inventory/update/(:num)', 'InventoryAdminController::update/$1', ['filter' => 'role:admin,staff']);
$routes->delete('/inventory/delete/(:num)', 'InventoryAdminController::delete/$1', ['filter' => 'role:admin,staff']);

// Staff
$routes->get('/staff', 'StaffController::index', ['filter' => 'role:admin']);
$routes->get('/staff/insert', 'StaffController::insert', ['filter' => 'role:admin']);
$routes->post('/staff/save', 'StaffController::save', ['filter' => 'role:admin']);
$routes->delete('/users/delete/(:num)', 'StaffController::delete/$1', ['filter' => 'role:admin']);

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
