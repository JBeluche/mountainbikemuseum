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
Route::get('/dashboard/help', 'DashboardController@help');

//Pages management
Route::get('/page/create', 'PagesController@create');
Route::post('/page/create', 'PagesController@store');
Route::get("/page/edit/{page}", "PagesController@edit");
Route::post('page/edit/{page}', 'PagesController@update');

//Component management
Route::get("/component/edit/{component}", "ComponentController@edit");
Route::post("/component/edit/{component}", "ComponentController@update");


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
 



                                   