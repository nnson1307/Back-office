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
    return redirect()->route('login');
});

Route::get('locale/{locale}',function ($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});
#Route::get('/', 'IndexController@indexAction')->name('home');
#Route::match(['get', 'post'], '/login', 'LoginController@indexAction');
