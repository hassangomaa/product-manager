<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


//Route::get('/', function () {
//    return view('welcome');
//});






Route::group(['middleware' => 'auth', 'as' => 'products.'], function () {
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/import', 'ProductController@import')->name('import');
    Route::post('/upload', 'ProductController@upload')->name('upload');
});

