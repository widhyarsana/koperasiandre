<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('/dashboard');
});

// Route::get('/', function () {
//     return redirect('/dashboard');
// });

Auth::routes(['register' => false]);

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::middleware(['auth', 'role:manager'])->namespace('Manager')->prefix('manager')->name('manager.')->group(function(){
    Route::prefix('staff')->name('staff.')->group(function(){
        Route::get('/', 'StaffController@index')->name('index');
        Route::get('/create', 'StaffController@create')->name('create');
        Route::post('/create', 'StaffController@store')->name('store');
        Route::get('/edit/{staff:username}', 'StaffController@edit')->name('edit');
        Route::post('/edit/{staff}', 'StaffController@update')->name('update');
        Route::post('/delete', 'StaffController@delete')->name('delete2');
    });

    Route::prefix('criteria')->name('criteria.')->group(function () {
        Route::get('/', 'CriteriaController@index')->name('index');
        Route::get('/create', 'CriteriaController@create')->name('create');
        Route::post('/create', 'CriteriaController@store')->name('store');
        Route::get('/show/{criteria}', 'CriteriaController@show')->name('show');
        Route::get('/edit/{criteria}', 'CriteriaController@edit')->name('edit');
        Route::post('/edit/{criteria}', 'CriteriaController@update')->name('update');
        Route::post('/delete', 'CriteriaController@delete')->name('delete2');
    });

    Route::prefix('subcriteria')->name('subcriteria.')->group(function () {
        Route::get('/', 'SubCriteriaController@index')->name('index');
        Route::get('/create', 'SubCriteriaController@create')->name('create');
        Route::post('/create', 'SubCriteriaController@store')->name('store');
        Route::get('/show/{subCriteria}', 'SubCriteriaController@show')->name('show');
        Route::get('/edit/{subCriteria}', 'SubCriteriaController@edit')->name('edit');
        Route::post('/edit/{subCriteria}', 'SubCriteriaController@update')->name('update');
        Route::post('/delete', 'SubCriteriaController@delete')->name('delete2');
    });
});

Route::middleware(['auth', 'role:staff'])->namespace('Staff')->prefix('staff')->name('staff.')->group(function () {
    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get('/', 'CustomerController@index')->name('index');
        Route::get('/create', 'CustomerController@create')->name('create');
        Route::post('/create', 'CustomerController@store')->name('store');
        Route::get('/edit/{customer}', 'CustomerController@edit')->name('edit');
        Route::post('/edit/{customer}', 'CustomerController@update')->name('update');
        Route::post('/delete', 'CustomerController@delete')->name('delete2');
    });

    Route::prefix('criteria')->name('criteria.')->group(function () {
        Route::get('/', 'CriteriaController@index')->name('index');
        Route::get('/show/{criteria}', 'CriteriaController@show')->name('show');
    });

    Route::prefix('subcriteria')->name('subcriteria.')->group(function () {
        Route::get('/', 'SubCriteriaController@index')->name('index');
    });

    Route::prefix('valuation')->name('valuation.')->group(function () {
        Route::get('/', 'ValuationController@index')->name('index');
        Route::get('/create', 'ValuationController@create')->name('create');
        Route::post('/create', 'ValuationController@store')->name('store');
        Route::get('/show/{valuation}', 'ValuationController@show')->name('show');
    });
});

Route::middleware(['auth', 'role:manager|staff'])->namespace('Report')->group(function () {
    Route::prefix('/report')->group(function () {
        Route::prefix('/valuation')->name('report.')->group(function () {
            Route::get('/', 'ValuationReportController@index')->name('valuation.index');
            Route::post('/store', 'ValuationReportController@store')->name('valuation.store');
            Route::post('/print', 'ValuationReportController@print')->name('valuation.print');
        });
    });
});