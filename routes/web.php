<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class, 'index']);
Route::middleware([
    'auth:sanctum',
    'verified',
])->get('/dashboard', function () {
        return view('dashboard');
})->name('dashboard');

Route::get('/redirect',[HomeController::class, 'redirect'])->name('home');
Route::get('/view_category',[AdminController::class, 'view_category']);
Route::post('/add_category',[AdminController::class, 'add_category']);
Route::get('/delete_category/{id}',[AdminController::class, 'delete_category']);
Route::get('/view_product',[AdminController::class, 'view_product']);
Route::post('/add_product',[AdminController::class, 'add_product']);
Route::get('/show_product',[AdminController::class, 'show_product']);
Route::get('/delete_product/{id}',[AdminController::class, 'delete_product']);
Route::get('/update_product/{id}',[AdminController::class, 'update_product']);
Route::post('/edit_product/{id}',[AdminController::class, 'edit_product']);
Route::get('/product_details/{id}',[HomeController::class, 'product_details']);
Route::post('/add_cart/{id}',[HomeController::class, 'add_cart']);
Route::get('/show_cart',[HomeController::class, 'show_cart']);
Route::get('/remove_cart/{id}',[HomeController::class, 'remove_cart']);
Route::get('/cash_order',[HomeController::class, 'cash_order']);
