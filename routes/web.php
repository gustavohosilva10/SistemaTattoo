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

//Site
Route::get('index', 'Admin\RostoController@index')->name('index');

//Lodin
Route::get('/', function () {
    if (Auth::guest()) {
        return view('auth.login');
    }

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
// PDF
Route::get('pdf/{id_contact}', 'Admin\PdfController@geraPdf');
//Contratos
Route::get('/contracts/index', 'Admin\ContractsController@index')->name('admin.contracts.index');
Route::get('/contracts/contract/lista', 'Admin\ContractsController@list')->name('admin.contracts.contract.list');
Route::get('/contracts/contract/novo', 'Admin\ContractsController@create')->name('admin.contracts.contract.novo');
Route::post('/contracts/contract/salvar', 'Admin\ContractsController@store')->name('admin.contracts.contract.salvar');
Route::delete('/contracts/contract/{id}', 'Admin\ContractsController@destroy');

// Landing-page
Route::get('/pageprincipal/index', 'Admin\PageprincipalsController@index')->name('admin.pageprincipal.index');

//Inicio
Route::get('/welcome/index', 'Admin\WelcomeController@index')->name('admin.welcome.index');
Route::post('/welcome/index', 'Admin\WelcomeController@store');
Route::delete('/welcome/index/{id}', 'Admin\WelcomeController@destroy');

//Photos
Route::get('/photos/index', 'Admin\PhotosController@index')->name('admin.photos.index');
Route::post('/photos/index', 'Admin\PhotosController@store');
Route::delete('/photos/index/{id}', 'Admin\PhotosController@destroy');

//Bibliografia
Route::get('/bibliography/index', 'Admin\BibliographyController@index')->name('admin.bibliography.index');
Route::post('/bibliography/index', 'Admin\BibliographyController@store');
Route::delete('/bibliography/index/{id}', 'Admin\BibliographyController@destroy');

//Promoções
Route::get('/postes/index', 'Admin\PostController@index')->name('admin.postes.index');
Route::post('/postes/index', 'Admin\PostController@store');
Route::delete('/postes/index/{id}', 'Admin\PostController@destroy');

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

            // Tattoo
            Route::name('tattoo.')->prefix('tattoo')->group(function () {
                Route::post('salvar', 'Admin\ContactsController@storeTattoo')->name('storeTattoo');
                Route::get('{id}/excluir', 'Admin\ContactsController@destroyTattoo')->name('destroyTattoo');
            });
            // Sessoes
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
