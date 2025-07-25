<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('createRolesAndPermissions', [\App\Http\Controllers\RolePermissionController::class, 'create']);
