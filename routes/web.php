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
    return view('home');
});
Route::get('/ordercreate', function () {
    return view('orderForm');
});
Route::get('/frontmessage', function () {
    return view('frontmessage');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('admin/dashboard');
});

Route::post('/storeOrder', 'FrontEndController@storeOrder')->name('storeOrder');

Route::get('/createOrder', 'FrontEndController@createOrder')->name('createOrder');

Route::group(array('prefix' => 'admin'), function()
{

    Route::get('/', function () {
        return redirect('login');
    });

    Route::get('dashboard', 'BackEndController@dashboard')->name('admin.dashboard');
    Route::get('orders', 'BackEndController@orders')->name('admin.orders');
    Route::get('completeorder/{id}', 'BackEndController@completeorder')->name('admin.completeorder');
    Route::get('dailysale', 'BackEndController@dailysale')->name('admin.dailysale');
    Route::get('mainDishWithPopularSideDishes', 'BackEndController@mainDishWithPopularSideDishes')->name('admin.mainDishWithPopularSideDishes');

});

Route::get('/run', 'FrontEndController@run');





