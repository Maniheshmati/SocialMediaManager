<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Use pagination instead of loading everything
        $users = User::with('roles')->paginate(10); // eager load roles to avoid N+1 problem
//        dd($users);
        $roles = Role::all();

        return view('admin.users', compact('users', 'roles'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'user_role' => 'required'
        ]);

        $user = User::create([
            'name' => $validatedData['user_name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password'])
        ]);

        // save role
        $user->assignRole($validatedData['user_role']);

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
    public function destroy(User $user)
    {
        //
    }
}
