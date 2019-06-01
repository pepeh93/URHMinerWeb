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

Auth::routes();

Route::view('/', 'home')->name('home')->middleware('auth');
Route::view('/home', 'home')->name('home')->middleware('auth');
Route::view('/valores', 'valores')->name('valores')->middleware('auth');
Route::view('/contacto', 'contacto')->name('contacto');
Route::view('/faq', 'faq')->name('faq')->middleware('auth');
Route::view('/descargas', 'descargas')->name('descargas')->middleware('auth');

Route::get('/administrar', 'AdminController@getDashboard')->name('administrar');
Route::post('/contacto', 'ContactoController');

Route::resource('content', 'ContentController');
Route::resource('category', 'CategoryController');
Route::resource('pool', 'PoolController');
Route::get('users', 'AdminController@getUsers')->name('user.index');
Route::get('pools', 'PoolController@getPools')->name('pools')->middleware('auth');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');
