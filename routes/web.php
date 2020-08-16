<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index')
    ->name('home');

Route::get('/detail/{slug}','DetailController@index')
    ->name('detail');

Route::get('/paket-travel','PaketTravel@index')
    ->name('paket-travel');

Route::get('/search-travel','PaketTravel@search')
    ->name('search-travel');

Route::get('/checkout/{id}','CheckoutController@index')
    ->middleware(['auth','verified'])
    ->name('checkout');

Route::post('/checkout/{id}','CheckoutController@process')
    ->name('checkout-process')
    ->middleware(['auth','verified']);

Route::post('/checkout/create/{detail_id}','CheckoutController@create')
    ->name('checkout-create')
    ->middleware(['auth','verified']);

Route::get('/checkout/remove/{detail_id}','CheckoutController@remove')
    ->name('checkout-remove')
    ->middleware(['auth','verified']);

Route::get('/checkout/confirm/{id}','CheckoutController@success')
    ->name('checkout-success')
    ->middleware(['auth','verified']);

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/','DashboardController@index')
            ->name('dashboard');
        Route::resource('travel-package','TravelPackageController');
        Route::resource('transaction','TransactionController');
        Route::resource('gallery','GalleryController');
    });

Auth::routes(['verify' => true]);
