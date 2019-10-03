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
////Adverts
Route::get('/Admin/Adverts', ['as' => 'adverts.index', 'uses' => 'Admin\AdminAdvertController@index']);
Route::post('/Admin/Adverts', ['as' => 'adverts.store', 'uses' => 'Admin\AdminAdvertController@store']);
Route::patch('/Admin/Adverts', ['as' => 'adverts.update', 'uses' => 'Admin\AdminAdvertController@update']);
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
////Campaigns
Route::get('/Admin/Campaigns', ['as' => 'campaigns.index', 'uses' => 'Admin\CampaignController@index']);
Route::post('/Admin/Campaigns', ['as' => 'campaigns.store', 'uses' => 'Admin\CampaignController@store']);
Route::patch('/Admin/Campaigns', ['as' => 'campaigns.update', 'uses' => 'Admin\CampaignController@update']);
////CampaignAdverts
Route::get('/Admin/CampaignAdverts', ['as' => 'campaignadverts.index', 'uses' => 'Admin\CampaignAdvertsController@index']);
Route::post('/Admin/CampaignAdverts', ['as' => 'campaignadverts.store', 'uses' => 'Admin\CampaignAdvertsController@store']);
Route::patch('/Admin/CampaignAdverts', ['as' => 'campaignadverts.update', 'uses' => 'Admin\CampaignAdvertsController@update']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
