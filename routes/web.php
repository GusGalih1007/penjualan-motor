<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EngineController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\MotorsController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\TransactionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect(route('login'));
});

//membuat route transactions
    Route::get('transaction', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('transaction', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('transaction/{id}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::delete('transaction/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');

// Auth::routes();
Route::get('/login', [AuthenController::class, 'showlogin'])->name('login');
Route::post('/login', [AuthenController::class, 'proseslogin'])->name('login.post');
Route::get('/logout', [AuthenController::class, 'logout'])->name('logout');

// Route::get('/home', 'HomeController@index')->name('home');


// Route::middleware('role:admin')->group(function () {
    Route::get('/user', [UsersController::class, 'index'])->name('users.index');
    Route::get('/user/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/user', [UsersController::class, 'store'])->name('users.store');
    Route::get('/user/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/user/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/user/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
// });

Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
Route::post('/brand', [BrandController::class, 'store'])->name('brand.store');
Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
Route::put('/brand/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::delete('/brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/engine', [EngineController::class, 'index'])->name('engine.index');
Route::get('/engine/create', [EngineController::class, 'create'])->name('engine.create');
Route::post('/engine', [EngineController::class, 'store'])->name('engine.store');
Route::get('/engine/edit/{id}', [EngineController::class, 'edit'])->name('engine.edit');
Route::put('/engine/{id}', [EngineController::class, 'update'])->name('engine.update');
Route::delete('/engine/{id}', [EngineController::class, 'destroy'])->name('engine.destroy');

Route::get('/customer', [CustomersController::class, 'index'])->name('customer.index');
Route::get('/customer/create', [CustomersController::class, 'create'])->name('customer.create');
Route::post('/customer', [CustomersController::class, 'store'])->name('customer.store');
Route::get('/customer/edit/{id}', [CustomersController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{id}', [CustomersController::class, 'update'])->name('customer.update');
Route::delete('/customer/{id}', [CustomersController::class, 'destroy'])->name('customer.destroy');

Route::get('/motor', [MotorsController::class, 'index'])->name('motor.index');
Route::get('/motor/create', [MotorsController::class, 'create'])->name('motor.create');
Route::post('/motor', [MotorsController::class, 'store'])->name('motor.store');
Route::get('/motor/edit/{id}', [MotorsController::class, 'edit'])->name('motor.edit');
Route::put('/motor/{id}', [MotorsController::class, 'update'])->name('motor.update');
Route::delete('/motor/{id}', [MotorsController::class, 'destroy'])->name('motor.destroy');
