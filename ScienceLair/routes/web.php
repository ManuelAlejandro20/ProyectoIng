<?php

use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        $user_type = Auth::user()->user_type;
        if ($user_type == 'INVESTIGADOR') {
            return view('home');
        }
        return view('homeadmin');
    }
    return view('homeplain');
});

Auth::routes(['register' => false]);


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homeadmin', 'HomeAdminController@index')->name('homeadmin');

Route::get('registeradmin', 'Auth\RegisterAdminInvController@showRegistrationForm')->name('registeradmin');
Route::post('registeradmin', 'Auth\RegisterAdminInvController@register');

Route::get('registerinv', 'Auth\RegisterInvController@showRegistrationForm')->name('registerinv');
Route::post('registerinv', 'Auth\RegisterInvController@register');

Route::get('registerproject', 'Auth\RegisterProjectController@showRegistrationForm')->name('registerproject');
Route::post('registerproject', 'Auth\RegisterProjectController@register');


Route::get('gestionargrupos', 'Auth\RegisterGestionarGruposController@showRegistrationForm')->name('gestionargrupos');
Route::post('gestionargrupos', 'Auth\RegisterGestionarGruposController@upload');
