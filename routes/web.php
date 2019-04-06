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

Route::get('lang/{lang}', 'Admin\LocalizeController@index')->name('user.lang.set');

Route::get('/', function () {
    return view('web.index');
});

Route::get('/invoice', function () {
    return view('web.invoice', ['hideHeader' => true]);
});

Route::get('/search/{id}', function ($id) {
    $requestInfo = \App\Models\Request::find($id);
    return view('web.index', ['orderInfo' => $requestInfo]);
});
