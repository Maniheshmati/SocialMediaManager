<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth','can:access-admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('posts', \App\Http\Controllers\Admin\PostController::class); // replace with your entities

        Route::group(['prefix' => 'users'], function (){
            Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
            Route::post('/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
        });
    });

require __DIR__.'/auth.php';
