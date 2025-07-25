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
        // Reset cache if needed
//        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permission and role
//        $permission = Permission::firstOrCreate(['name' => 'see users']);
//        $role = Role::firstOrCreate(['name' => 'admin']);

        // Assign permission to role
//        $role->givePermissionTo($permission);

//        return response()->json([
//            'message' => 'Role and permission created successfully.',
//            'role' => $role->name,
//            'permission' => $permission->name
//        ]);

        $role = Role::firstOrCreate(['name' => 'مدیر پیج']);

        return response()->json([
            'message' => 'Role created successfully.',
            'role' => $role->name
        ]);

    }
}
