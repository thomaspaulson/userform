<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserFormController;
use App\Http\Controllers\FormFieldController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [DashboardController::class, 'index']);

Route::name('admin.')->prefix('admin')->group(function () {
    Route::resource('forms', UserFormController::class);
    Route::resource('fields', FormFieldController::class);
});