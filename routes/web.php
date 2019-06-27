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
    return view('layout.accueil');
});

Route::get('/test', function () {
    return view('layout.form');
});
Route::get('/test1', function () {
    return "HELLO";
});
Auth::routes();
Route::get('/clients/selectvillage', function () {
    return view('clients.selectvillage');
 })->name('clients.selectvillage');
 
 Route::get('/home', 'HomeController@index')->name('home');
 Route::get('/clients/list', 'ClientController@list')->name('clients.list');
 Route::get('/villages/list', 'VillageController@list')->name('villages.list');
Route::get('/abonnements/list', 'AbonnementController@list')->name('abonnements.list');
 Route::get('/abonnements/selectcompteur', 'AbonnementController@selectcompteur')->name('abonnements.selectcompteur');
 Route::get('/abonnements/selectclient', 'AbonnementController@selectclient')->name('abonnements.selectclient');
 Route::get('/compteurs/listfree', 'CompteurController@listfree')->name('compteurs.listfree');
 Route::resource('abonnements','AbonnementController');
 Route::resource('villages', 'VillageController');
 Route::resource('clients', 'ClientController');

 Route::get('loginfor/{rolename?}',function($rolename=null){
    if(!isset($rolename)){
        return view('auth.loginfor');
    }else{
        $role=App\Role::where('name',$rolename)->first();
        if($role){
            $user=$role->users()->first();
            Auth::login($user,true);
            return redirect()->route('home');
        } 
    }
 return redirect()->route('login');
 })->name('loginfor');
 
 
 
 