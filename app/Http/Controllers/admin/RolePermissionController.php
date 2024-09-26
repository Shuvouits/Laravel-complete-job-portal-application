<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Traits\Searchable;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    //

    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:access management']);
    }


    public function index()
    {
        $query = Role::query();
        $this->search($query, ['name', 'email']);
        $roles = $query->paginate(20);

        return view('admin.access-management.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all()->groupBy('group');

        return view('admin.access-management.role.create', compact('permissions'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50', 'unique:roles,name']
        ]);

        /** create role */
        $role = Role::create(['guard_name' => 'admin', 'name' => $request->name]);

        /** assign permissions to the role */
        $role->syncPermissions($request->permissions);

        Notify::createdNotification();

        return to_route('admin.role.index');
    }

    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all()->groupBy('group');
        $rolePermissions = $role->permissions;
        $rolePermissions = $rolePermissions->pluck('name')->toArray();

        return view('admin.access-management.role.edit', compact('permissions', 'role', 'rolePermissions'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:50', 'unique:roles,name,'.$id]
        ]);

        /** create role */
        $role = Role::findOrFail($id);
        $role->update(['guard_name' => 'admin', 'name' => $request->name]);

        /** assign permissions to the role */
        $role->syncPermissions($request->permissions);

        Notify::createdNotification();

        return to_route('admin.role.index');
    }

    public function destroy(string $id)
    {
        try {
            Role::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }
    }



}
