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
    return view('welcome');
});

Auth::routes(['verify' => true]);

//Route::get('/chat', 'MessagesController@index')->name(config('chatify.path'))->middleware('verified');


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
 
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
$this->get('logout', 'Auth\LoginController@logout')->name('logout');

 Route::get('/verify', 'UsersController@verify')->name('verify');


Route::post('/users/updating','UsersController@updating')->name('users.updating');
Route::get('/users','UsersController@index')->name('users');
Route::get('/users/view/{id}', 'UsersController@view');
Route::get('/users/destroy/{id}', 'UsersController@destroy');
Route::get('/profile', 'UsersController@profile')->name('profile');
Route::post('/updateuser','UsersController@updateuser')->name('updateuser');



Route::post('/salons/updating','SalonsController@updating')->name('salons.updating');
Route::get('/salons','SalonsController@index')->name('salons');
Route::get('/salons/view/{id}', 'SalonsController@view');
Route::get('/salons/destroy/{id}', 'SalonsController@destroy');
Route::get('/salons/users', 'SalonsController@users')->name('salons.users');
Route::get('/salons/create', 'SalonsController@create')->name('salons.create');
Route::get('/salons/edit', 'SalonsController@edit')->name('salons.edit');
Route::post('/salons/edit', 'SalonsController@edit')->name('salons.edit');
Route::post('/salons/store/', 'SalonsController@store')->name('salons.store');

Route::get('/abonnements', 'PaymentController@abonnements')->name('abonnements');

Route::get('/payment', 'PaymentController@index');
Route::post('/charge', 'PaymentController@charge');



/*
Route::post('/salonidInfo', 'MessagesController@salonidFetchData');
Route::post('/salonfetchMessages', 'MessagesController@salonfetch')->name('salon.messages');
*/