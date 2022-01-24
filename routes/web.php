<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
Route::get('/product',[ProductController::class, 'index'])->name('product');

Route::get('/add',[ProductController::class, 'add'])->name('add');
Route::post('/insert',[ProductController::class, 'insert'])->name('insert');

Route::get('/edit/{id}',[ProductController::class, 'edit'])->name('edit');
Route::post('/update/{id}',[ProductController::class, 'update'])->name('update');

Route::get('/delete/{id}',[ProductController::class, 'delete'])->name('delete');

Route::get('/exportpdf',[ProductController::class, 'exportpdf'])->name('exportpdf');
Route::get('/exportexcel',[ProductController::class, 'exportexcel'])->name('exportexcel');
Route::post('/importexcel',[ProductController::class, 'importexcel'])->name('importexcel');
