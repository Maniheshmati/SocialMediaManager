<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function view(Request $request)
    {
        $users = User::with('roles');

        // apply filter if provided
        if ($request->has('filter')) {
            switch ($request->filter) {
                case 'yesterday':
                    $users->whereDate('created_at', now()->subDay());
                    break;
                case '7days':
                    $users->where('created_at', '>=', now()->subDays(7));
                    break;
                case '30days':
                    $users->where('created_at', '>=', now()->subDays(30));
                    break;
                case 'month':
                    $users->where('created_at', '>=', now()->subMonth());
                    break;
                case 'year':
                    $users->where('created_at', '>=', now()->subYear());
                    break;
            }
        }
        // Use pagination instead of loading everything
        $users = $users->paginate(10);
        //        dd($users);
        $roles = Role::all();

        return view('admin.users', compact('users', 'roles'));
    }

    public function index(Request $request){
        $users = User::with('roles');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $users->where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if($request->has('filterRole') && !empty($request->filterRole)){
            $role = $request->filterRole;
            if($role == 'No Role')
                $users->whereDoesntHave('roles');

            else
                $users->whereHas('roles', function($query) use ($role){
                    $query->where('name', $role);
                });
        }
        // apply filter if provided
        if ($request->has('filter')) {
            switch ($request->filter) {
                case 'yesterday':
                    $users->whereDate('created_at', '>=', now()->subDay());
                    break;
                case '7days':
                    $users->where('created_at', '>=', now()->subDays(7));
                    break;
                case '30days':
                    $users->where('created_at', '>=', now()->subDays(30));
                    break;
                case 'month':
                    $users->where('created_at', '>=', now()->subMonth());
                    break;
                case 'year':
                    $users->where('created_at', '>=', now()->subYear());
                    break;
            }
        }
        // Use pagination instead of loading everything
        $users = $users->paginate(10);
        //        dd($users);
        $roles = Role::all();

        return response()->json([
            'users' => $users,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if($request->has('id'))
            $id = $request->id;
        else
            $id = null;
        $validatedData = $request->validate([
            'name' => 'required',
            'role' => 'required'
        ]);

        if($request->has('email'))
            $email = $request->email;
        else
            $email = null;
        if($request->has('mobile'))
            $mobile = $request->mobile;
        else
            $mobile = null;
        $user = User::updateOrCreate(['id' => $id], [
            'name' => $validatedData['name'],
            'email' => $email,
            'mobile' => $mobile,
            'password' => Hash::make($request->password),
        ]);

        if($validatedData['role'] != 'No Role'){
            $user->assignRole($validatedData['role']);
        }

        // Response depending on request type
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ], 201);
        }

        return redirect()->back()->with('success', 'User created successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::find($id);

        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
