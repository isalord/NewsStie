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

Route::get('/', 'HomeController@ShowHome')->name("home");


Route::get('/contact', function () {
    return view('website.contact');
})->name("contact");

Route::get('/Admin/login', function () {
    return view('cms.login');
})->name("login");


Route::get('/category/{id}/news', 'HomeController@ShowCategoryArticel')->name("all_news");
Route::get('/all_news/{id}/news_details', 'HomeController@ShowArticel')->name("news_de");

Route::prefix('/admin/')->group(function () {
    Route::view('login', 'cms.auth.login')->name("login");
    Route::view('register', 'cms.auth.register')->name("register");
    Route::view('forget/password', 'cms.auth.forget_password')->name("forget_password");
    Route::view('recover/password', 'cms.auth.recover_password')->name("recover_password");

    });


Route::prefix('/admin/')->group(function () {
    Route::view('', 'cms.dashboard')->name("dashboard");
    Route::view('lock', 'cms.auth.lock_screen')->name("lock_screen");
    Route::view('tables', 'cms.pages.forms.simple')->name("simple");
    Route::view('Forms', 'cms.pages.forms.general')->name("general");

});

Route::prefix('/categories/')->group(function () {
    Route::post('store', 'CategoryController@store')->name('cat.con.store');
    Route::get('create/view', 'CategoryController@create')->name('cat.con.create');
    Route::get('', 'CategoryController@index')->name("cat.con.index");
    Route::get('{id}/edit', 'CategoryController@edit')->name("cat.con.edit");
    Route::get('/{id}/delete', 'CategoryController@destroy')->name("cat.con.destroy");
    Route::put('/{id}/update', 'CategoryController@update')->name('cat.con.update');
    Route::get('/{id}', 'CategoryController@show');
    Route::get('/{id}/articels', 'CategoryController@showArticel')->name('cat.con.articel');
});

Route::prefix('/articels/')->group(function () {
    Route::get('', 'ArticelController@index')->name('art.con.index');
    Route::get('create/view', 'ArticelController@create')->name('art.con.create');
    Route::post('store', 'ArticelController@store')->name('art.con.store');
    Route::get('{id}/edit', 'ArticelController@edit')->name("art.con.edit");
    Route::get('/{id}/delete', 'ArticelController@destroy')->name("art.con.destroy");
    Route::put('/{id}/update', 'ArticelController@update')->name('art.con.update');
    Route::get('/{id}', 'ArticelController@show');


});

Route::prefix('/authors/')->group(function () {
    Route::get('', 'AuthorController@index')->name('author.con.index');
    Route::get('create/view', 'AuthorController@create')->name('author.con.create');
    Route::post('store', 'AuthorController@store')->name('author.con.store');
    Route::get('{id}/edit', 'AuthorController@edit')->name("author.con.edit");
    Route::get('/{id}/delete', 'AuthorController@destroy')->name("author.con.destroy");
    Route::put('/{id}/update', 'AuthorController@update')->name('author.con.update');
    Route::get('/{id}', 'AuthorController@show');
    Route::get('/{id}/articels', 'AuthorController@showArticels')->name('author.con.art');


});

