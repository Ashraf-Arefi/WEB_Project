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

Route::get('/', 'AdminController@home')->name('home');

// Admins Auth
Route::get('/admin/login', 'AdminController@login')->name('login');
Route::post('/admin/login', 'AdminController@doLogin')->name('post.login');



Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {


    Route::get('/logout', 'AdminController@logout')->name('logout');

    Route::get('/add', 'AdminController@create')->name('admin.add');
    Route::post('/add', 'AdminController@store')->name('admin.store');
    Route::get('/edit/{id}', 'AdminController@edit')->name('admin.edit'); // edit
    Route::post('/edit/{id}', 'AdminController@update')->name('admin.update'); // update

    Route::get('/list', 'AdminController@index')->name('admin.list');
    Route::get('/delete/{id}','AdminController@destroy')->name('admin.delete');


    Route::get('/about', 'AdminController@about')->name('admin.about');
    Route::get('/setting', 'AdminController@setting')->name('admin.setting');
// Admin Profile
    Route::get('/profile','AdminController@profile')->name('admin.profile');
    Route::post('/profile','AdminController@profile_update')->name('admin.update.profile');


// Mojrem Routes
    Route::get('/add_mojrem', 'MojremController@create')->name('admin.mojrem.add');
    Route::post('/add_mojrem', 'MojremController@store')->name('admin.mojrem.store');

    Route::get('/list_mojrem', 'MojremController@index')->name('admin.mojrem.list');
    Route::get('/view_mojrem/{id}','MojremController@show')->name('admin.show.mojrem');

    Route::get('/delete_mojrem/{id}','MojremController@delete')->name('admin.delete.mojrem');


    Route::get('/search_mojrem', 'MojremController@search')->name('admin.search.mojrem');

// Document Routes
    Route::get('/add_document/{id}', 'DocumentController@create')->name('admin.add.document');
    Route::post('/add_document/{id}', 'DocumentController@store')->name('admin.add.document');
    Route::get('/view_document/{id}', 'DocumentController@show')->name('admin.view.document');
    Route::post('/view_document/{id}', 'DocumentController@upload_doc')->name('admin.upload.document');

    Route::get('/delete_document/{id}','DocumentController@delete')->name('admin.delete.document');


// General Report
    Route::get('/report', 'AdminController@report')->name('admin.report');
    Route::get('/report/general_report', 'AdminController@general_report')->name('admin.report.general');
//  Yearly Report
    Route::get('/report/yearly_report', 'AdminController@yearly_report')->name('admin.report.yearly');
    Route::get('/report/yearly', 'AdminController@year_r')->name('admin.yearly');
//    Monthly Report
    Route::get('admin/report/monthly_report', 'AdminController@monthly_report')->name('admin.report.monthly');
    Route::get('admin/report/monthly', 'AdminController@month_r')->name('admin.monthly');

//    Languages
    Route::get('lang/{locale}', function ($locale) {
        session()->put('locale', $locale);
        return redirect()->back();
    })->name('lang');

});