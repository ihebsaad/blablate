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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
$this->get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/users/updating','UsersController@updating')->name('users.updating');
Route::get('/users','UsersController@index')->name('users');
Route::get('/users/view/{id}', 'UsersController@view');
Route::get('/users/destroy/{id}', 'UsersController@destroy');


/*
Route::post('/salonidInfo', 'MessagesController@salonidFetchData');
Route::post('/salonfetchMessages', 'MessagesController@salonfetch')->name('salon.messages');
*/