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
    return view('auth.login');
});

Route::get('/home', function (){
   return view('home');
});

Route::resource('equipments','equipmentController');

Route::resource('departments','DepartmentController');

Route::resource('admins','AdminController');

Route::resource('bitacora','BitacoraController');

Route::resource('equipmentstypes','EquipmentTypeController');

Route::resource('inventory','InventoryController');

Route::resource('services','ServiceTypeController');

Route::resource('users','UserController');

Route::resource('direccionip','DireccionIPController');

Route::resource('domains','DomainController');

Route::resource('estates','EstateController');

Route::resource('marcas','MarcaController');

Route::resource('perifericos','PerifericoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


