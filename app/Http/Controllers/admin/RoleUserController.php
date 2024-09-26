<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use Spatie\Permission\Models\Role;

class RoleUserController extends Controller
{
    //
    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:access management']);
    }

    public function index()
    {
        $admins = Admin::all();
        return view('admin.access-management.role-user.index', compact('admins'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.access-management.role-user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:admins,email'],
            'password' => ['required', 'confirmed'],
            'role' => ['required']
        ]);

        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // assign role
        $user->assignRole($request->role);

        Notify::createdNotification();

        return to_route('admin.role-user.index');

    }

    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::all();

        return view('admin.access-management.role-user.edit', compact('admin', 'roles'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:admins,email,'.$id],
            'password' => ['confirmed'],
            'role' => ['required']
        ]);

        $user = Admin::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password) $user->password = bcrypt($request->password);
        $user->save();

        // assign role
        $user->syncRoles($request->role);

        Notify::updateNotification();

        return to_route('admin.role-user.index');
    }

    public function destroy(string $id)
    {

        $admin = Admin::findOrFail($id);
        if($admin->getRoleNames()->first() === 'Super Admin') {
            return response(['message' => 'You can\'t delete super admin!'], 500);
        }

        try {
            Admin::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }

    }



}
