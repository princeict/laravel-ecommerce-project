<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

/*
 * FRONTEND INFO
 */
Route::get('/', 'WelcomeController@index');
Route::get('/category-view/{id}', 'WelcomeController@category');
Route::get('/contact', 'WelcomeController@contact');
Route::get('/product-details/{id}', 'WelcomeController@productDetails');
Route::post('/addCart', 'CartController@addCart');
Route::get('/showCart', 'CartController@showCart');
Route::post('/deleteCart', 'CartController@deleteCart');
Route::post('/updateCart', 'CartController@updateCart');


Route::get('/checkout', 'CheckoutController@index');
Route::post('/checkout/sign-up', 'CheckoutController@customerRegistration');
Route::post('/checkout/customerLogin', 'CheckoutController@customerLogin');
Route::get('/checkout/customerLogout', 'CheckoutController@customerLogout');
Route::get('/checkout/shipping', 'CheckoutController@showShippingForm');
Route::post('/checkout/save-shipping', 'CheckoutController@saveShippingForm');
Route::get('/checkout/paymentInfo', 'CheckoutController@paymentInfo');
Route::post('/checkout/newOrder', 'CheckoutController@saveOrderInfo');


Route::get('/customer/customer-home', 'CustomerController@customerHome');
//Route::get('/', function () {
//    return view('welcome');
//    //return view('test');
//});

Auth::routes();
Route::get('/dashboard', 'HomeController@index');

Route::group(['middleware' => ['AuthenticateMiddleware']], function () {
    /*
     * Category Info
     */
    Route::get('/category/add', 'CategoryController@createCategory');
    Route::post('/category/save', 'CategoryController@storeCategory');
    Route::get('/category/manage', 'CategoryController@manageCategory');
    Route::get('/category/edit/{ID}', 'CategoryController@editCategory');
    Route::post('/category/update', 'CategoryController@updateCategory');
    Route::get('/category/delete/{ID}', 'CategoryController@deleteCategory');


    /*
     * Manufacturer Info
     */
    Route::get('/manufacturer/add', 'ManufacturerController@createManufacturer');
    Route::post('/manufacturer/save', 'ManufacturerController@storeManufacturer');
    Route::get('/manufacturer/manage', 'ManufacturerController@manageManufacturer');
    Route::get('/manufacturer/delete/{ID}', 'ManufacturerController@deleteManufacturer');
    Route::get('/manufacturer/edit/{ID}', 'ManufacturerController@editManufacturer');
    Route::post('/manufacturer/update', 'ManufacturerController@updateManufacturer');


    /*
     * Product Info
     */
    Route::get('/product/add', 'ProductController@createProduct');
    Route::post('/product/save', 'ProductController@storeProduct');
    Route::get('/product/manage', 'ProductController@manageProduct');
    Route::get('/product/view/{ID}', 'ProductController@viewProduct');
    Route::get('/product/delete/{ID}', 'ProductController@deleteProduct');
    Route::get('/product/edit/{ID}', 'ProductController@editProduct');
    Route::post('/product/update', 'ProductController@updateProduct');

    /*
     * User Info
     */
    Route::get('/user/add', 'UserController@createUser');
    Route::post('/user/save', 'UserController@storeUser');
    Route::get('/user/manage', 'UserController@manageUser');
    Route::get('/user/view/{ID}', 'UserController@viewUser');
    Route::get('/user/delete/{ID}', 'UserController@deleteUser');
    Route::get('/user/edit/{ID}', 'UserController@editUser');
    Route::post('/user/update', 'UserController@updateUser');

    /*
     * Order Info
     */
    Route::get('/order/manage', 'OrderController@index');
});



