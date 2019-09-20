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

//Admin
////Users
Route::get('/Admin/Users', ['as' => 'users.index', 'uses' => 'Admin\AdminUserController@index']);
Route::post('/Admin/Users', ['as' => 'users.store', 'uses' => 'Admin\AdminUserController@store']);
Route::patch('/Admin/Users', ['as' => 'users.update', 'uses' => 'Admin\AdminUserController@update']);
////Products
Route::get('/Admin/Products', ['as' => 'products.index', 'uses' => 'Admin\AdminProductController@index']);
Route::post('/Admin/Products', ['as' => 'products.store', 'uses' => 'Admin\AdminProductController@store']);
Route::patch('/Admin/Products', ['as' => 'products.update', 'uses' => 'Admin\AdminProductController@update']);
////Companies
Route::get('/Admin/Companies', ['as' => 'companies.index', 'uses' => 'Admin\AdminCompanyController@index']);
Route::post('/Admin/Companies', ['as' => 'companies.store', 'uses' => 'Admin\AdminCompanyController@store']);
Route::patch('/Admin/Companies', ['as' => 'companies.update', 'uses' => 'Admin\AdminCompanyController@update']);
////Teams
Route::get('/Admin/Teams', ['as' => 'teams.index', 'uses' => 'Admin\AdminTeamController@index']);
Route::post('/Admin/Teams', ['as' => 'teams.store', 'uses' => 'Admin\AdminTeamController@store']);
Route::patch('/Admin/Teams', ['as' => 'teams.update', 'uses' => 'Admin\AdminTeamController@update']);
////Licences
Route::get('/Admin/Licences', ['as' => 'licences.index', 'uses' => 'Admin\AdminLicenceController@index']);
Route::post('/Admin/Licences', ['as' => 'licences.store', 'uses' => 'Admin\AdminLicenceController@store']);
Route::patch('/Admin/Licences', ['as' => 'licences.update', 'uses' => 'Admin\AdminLicenceController@update']);
////Roles
Route::get('/Admin/Roles', ['as' => 'roles.index', 'uses' => 'Admin\AdminRoleController@index']);
Route::post('/Admin/Roles', ['as' => 'roles.store', 'uses' => 'Admin\AdminRoleController@store']);
Route::patch('/Admin/Roles', ['as' => 'roles.update', 'uses' => 'Admin\AdminRoleController@update']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
