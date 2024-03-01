<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/', function () {
    return redirect()->route('users.index');
});


Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::post('/update', [UserController::class, 'update'])->name('users.update');
});

