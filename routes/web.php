<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/dashboard', [CategoryController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/create', [CategoryController::class, 'create'])->middleware(['auth'])->name('create');

Route::post('/create-category', [CategoryController::class, 'store'])->middleware(['auth'])->name('store');

Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->middleware(['auth'])->name('edit');

Route::put('/update-category/{id}', [CategoryController::class, 'update'])->middleware(['auth'])->name('update');
Route::get('/delete-category/{id}', [CategoryController::class, 'delete'])->middleware(['auth'])->name('delete');

require __DIR__.'/auth.php';