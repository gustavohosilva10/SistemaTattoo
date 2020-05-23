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
    if (Auth::guest())
        return view('auth.login');
    return redirect()->route('admin.home');
});

// Auth::routes();
Route::middleware(['web', 'guest'])->group(function () {
    Route::get('login', 'Auth\LoginController@showloginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

Route::middleware(['web'])->group(function () {
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

Route::middleware(['auth', 'web'])->group(function () {
    Route::name('admin.')->prefix('sistema')->group(function () {
        // Admin Panel
        Route::get('painel', 'Admin\DashboardController@index')->name('home');

        // Contacts
        Route::name('contacts.')->prefix('contatos')->group(function () {
            // Contacts
            Route::get('', 'Admin\ContactsController@index')->name('index');
            Route::get('novo', 'Admin\ContactsController@create')->name('create');
            Route::post('salvar', 'Admin\ContactsController@store')->name('store');
            Route::get('{id}/contato', 'Admin\ContactsController@show')->name('show');
            Route::get('{id}/editar', 'Admin\ContactsController@edit')->name('edit');
            Route::put('{id}/alterar', 'Admin\ContactsController@update')->name('update');
            Route::get('{id}/excluir', 'Admin\ContactsController@destroy')->name('destroy');
            // Import
            Route::get('importar', 'Admin\ImportCsvController@file')->name('file');
            Route::post('processar', 'Admin\ImportCsvController@parseCsv')->name('parse');
            // Tattoo
            Route::name('tattoo.')->prefix('tattoo')->group(function () {
                Route::post('salvar', 'Admin\ContactsController@storeTattoo')->name('storeTattoo');
                Route::get('{id}/excluir', 'Admin\ContactsController@destroyTattoo')->name('destroyTattoo');
            });
            // Session
            Route::name('session.')->prefix('session')->group(function () {
                Route::post('salvar', 'Admin\ContactsController@storeSession')->name('storeSession');
                Route::get('{id}/excluir', 'Admin\ContactsController@destroySession')->name('destroySession');
            });
            // Autocomplete
            Route::name('autocomplete.')->prefix('autocomplete')->group(function () {
                Route::get('index', 'Admin\AutoCompleteController@index')->name('index');
                Route::get('search', 'Admin\AutoCompleteController@search')->name('search');
            });
        });
    });
});