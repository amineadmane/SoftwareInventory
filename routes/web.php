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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/customlog', ['uses' =>'Auth\LoginController@cutomlogin']);//authentification

Route::get('/','AppController@ListApp');//user acceuil

Route::get('/first',function() {
    return view('Firstlogin');
});//user acceuil



Route::get('/AcceuilAdmin', ['uses' =>'AdminController@index']);

Route::get('/getusers/{id}', 'StructController@getusers')->where('id', '[0-9]+');

Route::post('/createuser','AdminController@Createuser');
Route::post('/firstadmin','FirstController@firstadmin');

Route::post('/Createstruct','StructController@Create');
Route::post('/Modifstruct','StructController@Update');
Route::post('/Removestruct','StructController@Delete');

Route::post('/UpUser/{id}', ['uses' =>'UsersController@update'])->where('id', '[0-9]+');
Route::get('/DeleteUser/{id}', ['uses' =>'UsersController@destroy'])->where('id', '[0-9]+');
Route::get('/UpUser/{id}', ['uses' =>'UsersController@edit'])->where('id', '[0-9]+');

Route::get('/FichApp/{id}', ['uses' =>'AppController@showdetails'])->where('id', '[0-9]+');
Route::post('/UpApp/{id}', ['uses' =>'AppController@Update'])->where('id', '[0-9]+');
Route::get('/NewApp','AppController@edit');
Route::post('/CreateNewApp/', ['uses' =>'AppController@CreateNew']);
Route::post('/NewApp/{id}',['uses' =>'AppController@Create'])->where('id', '[0-9]+');
Route::get('/Deleteapp/{id}', ['uses' =>'AppController@Destroy'])->where('id', '[0-9]+');
Route::get('/History/{id}', ['uses' =>'AppController@History'])->where('id', '[0-9]+');

Route::get('/ExportExcelusers', ['uses' =>'AdminController@Exportusers']);
Route::get('/ExportExcelstructs', ['uses' =>'AdminController@Exportstructs']);
Route::get('/ExportExcelapps', ['uses' =>'AdminController@Exportapps']);









Auth::routes(['register' => false]);
