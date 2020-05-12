<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/todos', 'TodoController@index');
Route::get('/todos/create', 'TodoController@create');
Route::post('/todos/store', 'TodoController@store');
Route::get('/todos/makeCompleted/{id}', 'TodoController@makeCompleted');
Route::get('/todos/edit/{id}', 'TodoController@edit');
Route::put('/todos/update/{id}', 'TodoController@update');
Route::delete('/todos/delete/{id}', 'TodoController@delete');