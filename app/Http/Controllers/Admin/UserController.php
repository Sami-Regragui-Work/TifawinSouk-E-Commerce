<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->paginate(15);
        $columns = [
            ['name' => 'name', 'label' => 'Name'],
            ['name' => 'email'],
            ['name' => 'role.name', 'label' => 'Role'],
            ['name' => 'created_at', 'label' => 'Created'],
        ];
        return view('admin.users.index', compact('users', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        $fields = [
            ['name' => 'name', 'label' => 'Name', 'required' => true],
            ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'required' => true],
            ['name' => 'password', 'label' => 'Password', 'type' => 'password', 'required' => true],
            ['name' => 'password_confirmation', 'label' => 'Confirm Password', 'type' => 'password'],
            ['name' => 'role_id', 'label' => 'Role', 'type' => 'select', 'options' => $roles, 'required' => true],
        ];
        return view('admin.users.create', compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|confirmed',
            'role_id' => 'required|exists:roles,id'
        ]);

        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');
        $fields = [
            ['name' => 'name', 'label' => 'Name', 'required' => true],
            ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'required' => true],
            ['name' => 'password', 'label' => 'New Password (optional)', 'type' => 'password'],
            ['name' => 'password_confirmation', 'label' => 'Confirm Password', 'type' => 'password'],
            ['name' => 'role_id', 'label' => 'Role', 'type' => 'select', 'options' => $roles, 'required' => true],
        ];
        return view('admin.users.edit', compact('user', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'role_id' => 'required|exists:roles,id'
        ];

        if ($request->filled('email') && $request->email !== $user->email) {
            $rules['email'] = 'required|email|unique:users|max:255';
        }

        if ($request->filled('password')) {
            $rules['password'] = 'required|min:8|confirmed';
        }

        $validated = $request->validate($rules);

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
