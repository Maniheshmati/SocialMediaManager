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


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',

], function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class); // replace with your entities

    Route::group(['prefix' => 'users'], function (){
        Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'view'])->name('users.view');
        Route::get('/index', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::post('/createOrEdit', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::group(['prefix' => 'reports'], function (){
        Route::get('/', [\App\Http\Controllers\SocialAccountController::class, 'index'])->name('reports.index');
    });

    Route::get('/test', function () {
        return view('test');
    });
});
//    ->prefix('admin')
//    ->name('admin.')
//    ->group(function () {
//
//    });

require __DIR__.'/auth.php';
