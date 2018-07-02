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

Route::get('/equipment/add/caracteristicas/{id}','equipmentController@addcaracteristicas');

Route::post('/equipment/store/caracteristicas/{id}','equipmentController@storeCaracteristicas')->name('equipment-store');

Route::get('/equipment/add/software/{id}','equipmentController@addSoftware');

Route::post('/equipment/store/software/{id}','equipmentController@storeSoftware')->name('software-store');

Route::get('/equipment/add/red/{id}','equipmentController@addRed');

Route::post('/equipment/store/red/{id}','equipmentController@storeRed')->name('red-store');

Route::get('/equipment/generate/','equipmentController@generate')->name('inventario-generate');

Route::get('/equipment/generateExcel/','equipmentController@generateExcel')->name('generate-excel');

Route::resource('departments','DepartmentController');

Route::resource('admins','AdminController');

Route::resource('bitacora','BitacoraController');

Route::get('/bitacora/cargar/{id}','BitacoraController@cargar');

Route::get('/bitacora/bitacoras/{fecha}','BitacoraController@bitacoras');

Route::get('/bitacora/set/{fecha}','BitacoraController@index2')->name('bitacoranew');

Route::get('/bitacora/generate/{fecha}','BitacoraController@generate')->name('bitacora-generate');

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


