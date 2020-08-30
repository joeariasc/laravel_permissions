<?php

namespace App\Http\Controllers;

use App\Permissions\Models\Permission;
use App\Permissions\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('have_access', 'role.index');
        $roles = Role::orderBy('id', 'Desc')->paginate(2);
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission_role = [];
        $role = new Role;
        Gate::authorize('have_access', 'role.create');
        $permissions = Permission::get();
        return view('role.form', compact('permissions', 'role', 'permission_role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('have_access', 'role.create');
        $request->validate([
            'name' => 'required|max:50|unique:roles,name',
            'slug' => 'required|max:50|unique:roles,slug',
            'full_access' => 'required|in:yes,no'
        ]);
        $role = Role::create($request->all());

        if ($request->get('permission')) {
            $role->permissions()->sync($request->get('permission'));
        }
        return redirect()->route('role.index')
            ->with('status_success', __('Role saved successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        Gate::authorize('have_access', 'role.show');
        $permission_role = [];
        foreach ($role->permissions as $permission) {
            $permission_role[] = $permission->id;
        }
        $permissions = Permission::get();
        return view('role.view', compact('permissions', 'role', 'permission_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('have_access', 'role.edit');
        $permission_role = [];
        foreach ($role->permissions as $permission) {
            $permission_role[] = $permission->id;
        }
        $permissions = Permission::get();
        return view('role.form', compact('permissions', 'role', 'permission_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('have_access', 'role.edit');
        $request->validate([
            'name'          => 'required|max:50|unique:roles,name,' . $role->id,
            'slug'          => 'required|max:50|unique:roles,slug,' . $role->id,
            'full_access'   => 'required|in:yes,no'
        ]);

        $role->update($request->all());

        if ($request->get('permission')) {
            //return $request->all();
            $role->permissions()->sync($request->get('permission'));
        }
        return redirect()->route('role.index')
            ->with('status_success', __('Role updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Gate::authorize('have_access', 'role.destroy');
        $role->delete();
        return redirect()->route('role.index')
            ->with('status_success', __('Role successfully removed'));
    }
}
