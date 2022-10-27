<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.role.list', compact('roles'));
    }

    public function create()
    {
        $role = new Role();
        $permissions = Permission::all();

        return view('admin.role.form', compact('permissions', 'role'));
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create([
            'name' => $request->get('name'),
        ]);

        $role->syncPermissions($request->get('permission'));

        session()->flash('successMessage');
        return redirect('/admin/roles/list');
    }

    public function edit(int $roleId)
    {
        $role = Role::findOrFail($roleId);
        $permissions = Permission::all();

        return view('admin.role.form', compact('permissions', 'role'));
    }

    public function update($roleId, RoleRequest $request)
    {
        $role = Role::findOrFail($roleId);

        $role->update([
            'name' => $request->get('name'),
        ]);

        $role->syncPermissions($request->get('permission'));

        session()->flash('successMessage');
        return redirect('/admin/roles/list');
    }
}
