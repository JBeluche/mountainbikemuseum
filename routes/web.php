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

Route::get('/', function () {
    return redirect('/home');
})->name('home');

Route::get('/nl', function () {
    return redirect('/home');
})->name('home');

Route::get('/de', function () {
    return redirect('/home');
})->name('home');

Route::get('/en', function () {
    return redirect('/home');
})->name('home');


Route::get('/payment/approval/{product}', 'PaymentController@approveSubscription');
//Delete this controller and route
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/subscripties', 'DashboardController@subscriptiesGet');
Route::get('/dashboard/instellingen', 'DashboardController@instellingen');
Route::get('/dashboard/uitleg', 'DashboardController@help');

//Pages management
Route::get('/page/create', 'PagesController@create');
Route::post('/page/create', 'PagesController@store');
Route::get("/page/edit/{page}", "PagesController@edit");
Route::post('/page/edit/{page}', 'PagesController@update');
Route::get('/page/delete/{page}', 'PagesController@delete');
Route::get('/page/updatefile/{page}', 'PagesController@update');
Route::post('/page/show', 'PagesController@show');

//Component management
Route::get("/component/edit/{component}", "ComponentController@edit");
Route::post("/component/edit/{component}", "ComponentController@update");
Route::get("/component/delete/{component}", "ComponentController@delete");
Route::get("/component/edit/index/{component}", "ComponentController@updateindex");

//Component modules 
Route::get("/component_module/show", "ComponentModuleController@show");
Route::post("/component_module/create", "ComponentModuleController@store");
Route::get("/component_module/edit/{componentmodule}", "ComponentModuleController@edit");
Route::post("/component_module/edit/{componentmodule}", "ComponentModuleController@update");
Route::get("/component_module/delete/{componentmodule}", "ComponentModuleController@delete");

//Data text manager
Route::get("/text_data/show", "TextdataController@show");
Route::post("/text_data/show", "TextdataController@show");
Route::post("/text_data/edit/{textdata}", "TextdataController@update");
Route::get('/text_data/create', 'TextdataController@create');
Route::post('/text_data/create', 'TextdataController@store');
Route::get('/text_data/delete/{textdata}', 'TextdataController@destroy');

//Image data manager
Route::get("/image_data/show", "ImagedataController@show");
Route::get("/image_data/create", "ImagedataController@create");
Route::post("/image_data/create", "ImagedataController@store");
Route::get("/image_data/delete/{imagedate}", "ImagedataController@delete");

//Link data manager
Route::get("/link_data/show", "LinkdataController@show");
Route::get("/link_data/create", "LinkdataController@create");
Route::post("/link_data/create", "LinkdataController@store");
Route::get("/link_data/delete/{linkdata}", "LinkdataController@delete");

//Checkout process
Route::post('/checkout/auth', 'CheckoutController@auth')->name('checkout-auth');
Route::get('/checkout/auth', 'CheckoutController@auth');

Route::get('/checkout/login', 'CheckoutController@loginView');
Route::get('/checkout/register', 'CheckoutController@registerView');
Route::post('/checkout/login', 'CheckoutController@loginCreate');
Route::post('/checkout/register', 'CheckoutController@registerCreate');

Route::get('/checkout/payment-options', 'CheckoutController@options')->name('checkout-payment-options');

//If user is logged in it should go there
Route::post('/checkout/option', 'CheckoutController@options');
Route::get('/checkout/option', 'CheckoutController@options');
 
//Makes the payments
Route::post('/payment/pay', 'PaymentController@pay')->name('pay');
Route::get('/payment/approval', 'PaymentController@approval')->name('approval');
Route::get('/payment/cancelled', 'PaymentController@cancelled')->name('cancelled');
Route::get('/payment/cancel/{subscription}', 'PaymentController@cancelSubscription');

Auth::routes();

//You should make some kind of check so that it doesnt route to this if login or register. Make login and register unposible pages to create. Also any pages that exists
Route::post('/{page}/mail', 'PagesController@mail');
Route::get('/{page}', 'PagesController@show');
Route::post('/{page}', 'PagesController@requests');
Route::get('/language/{language}', 'PagesController@language');


Route::resource('page', 'PagesController');
 