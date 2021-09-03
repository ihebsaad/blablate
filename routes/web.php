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
})->name('welcome');

Route::get('/rgbd', 'HomeController@rgbd')->name('rgbd');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/setprefixe', 'HomeController@setprefixe')->name('setprefixe');
Route::post('/sendmessage', 'HomeController@sendmessage')->name('sendmessage');
Route::post('/sendemail', 'HomeController@sendemail')->name('sendemail');


Auth::routes(/*['verify' => true]*/);

//Route::get('/chat', 'MessagesController@index')->name(config('chatify.path'))->middleware('verified');

Route::get('/refresh', 'Auth\LoginController@refresh')->name('refresh');


Route::get('/home', 'HomeController@index')->name('home');//->middleware('verified');
 
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
$this->get('logout', 'Auth\LoginController@logout')->name('logout');

//  Route::get('/verify', 'UsersController@verify')->name('verify');

 Route::post('/signaler','HomeController@signaler')->name('signaler');
 Route::post('/bloqueruser','HomeController@bloqueruser')->name('bloqueruser');
 Route::post('/protection','HomeController@protection')->name('protection');

 


Route::post('/users/updating','UsersController@updating')->name('users.updating');
Route::get('/users','UsersController@index')->name('users');
Route::get('/users/view/{id}', 'UsersController@view');
Route::get('/users/destroy/{id}', 'UsersController@destroy');
Route::get('/users/bloquer/{id}', 'UsersController@bloquer');
Route::get('/users/debloquer/{id}', 'UsersController@debloquer');
Route::get('/profile', 'UsersController@profile')->name('profile');
Route::post('/updateuser','UsersController@updateuser')->name('updateuser');
Route::get('/users/deletemsg/{id}','UsersController@deletemsg')->name('deletemsg');
Route::post('/deletemessage','UsersController@deletemessage')->name('deletemessage');



Route::post('/salons/updating','SalonsController@updating')->name('salons.updating');
Route::get('/salons','SalonsController@index')->name('salons');
Route::get('/salons/view/{id}', 'SalonsController@view');
Route::get('/salons/destroy/{id}', 'SalonsController@destroy');
Route::get('/salons/users', 'SalonsController@users')->name('salons.users');
Route::get('/salons/create', 'SalonsController@create')->name('salons.create');
Route::get('/salons/edit', 'SalonsController@edit')->name('salons.edit');
Route::post('/salons/edit', 'SalonsController@edit')->name('salons.edit');
Route::post('/salons/store/', 'SalonsController@store')->name('salons.store');
 
 Route::get('/emails/envoimail/{id}/{type}/{prest}','EmailController@envoimail')->name('emails.envoimail');

Route::get('/chat/{route}/{salonid}','MessagesController@chat');
 
Route::get('/abonnements', 'PaymentController@abonnements')->name('abonnements');

Route::get('/payment', 'PaymentController@index');
Route::post('/charge', 'PaymentController@charge');



/*
Route::post('/salonidInfo', 'MessagesController@salonidFetchData');
Route::post('/salonfetchMessages', 'MessagesController@salonfetch')->name('salon.messages');
*/