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

# Page d'accueil
Route::get('/', 'FrontController@index');

 # Route SECURISEE pour afficher un livre en fonction de son id
Route::get('product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

// Pour afficher tous les livres associés à un genre 
Route::get('category/{id}', 'FrontController@showProductByCategory')->where(['id' => '[0-9]+']); 

Route::get('soldes', 'FrontController@showBySold')->where(['code' => 'soldes']);

Route::get('category/{id}', 'FrontController@byCategory')->where(['id'=>'[0-9]+']);


Route::get('accueil', 'FrontController@index')->where(['id'=>'[0-9]+']);

Auth::routes(); 
// Page dashboard

//Route::resource('admin', 'ProductController')->name('get','admin');
Route::resource('/admin', 'ProductController')->name('get','admin')->middleware('auth');