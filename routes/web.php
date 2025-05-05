<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', [UsersController::class, 'index'])->name('users.index');
Route::get('/user/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/user', [UsersController::class, 'store'])->name('users.store');
Route::get('/user/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/user/{id}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/user/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
