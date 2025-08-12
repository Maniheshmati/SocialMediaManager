<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function create()
    {
        Permission::create(['name' => 'manage settings']);
        Role::findByName('admin')->givePermissionTo('manage settings');

    }
}
