<?php

namespace App\Http\Controllers\Akses;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Akses\Role\StoreRoleRequest;
use App\Http\Requests\Akses\Role\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('akses.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akses.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        Role::create($request->validated());
        return to_route('roles.index')->with('sukses', 'role berhasil ditambahkan');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('akses.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        return to_route('roles.index')->with('sukses', 'role berhasil diubah'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->name == 'super-admin' or $role->name == 'admin') {
            return back()->with('gagal', 'role tidak dapat dihapus');
        }
        
        $role->delete();
        return to_route('roles.index')->with('sukses', 'role berhasil dihapus'); 
    }

    // permissions
    public function rolePermissions(Role $role)
    {
        $permissions = Permission::all();
        return view('akses.role.rolePermissions', compact('role', 'permissions'));
    }

    public function givePermissions(Request $request, Role $role)
    {
        $role->givePermissionTo($request->permission);
        return back()->with('sukses', 'permission berhasil diterapkan');
    }

    public function revokePermissions(Role $role, Permission $permission)
    {
        $role->revokePermissionTo($permission);
        return back()->with('sukses', 'permission berhasil dilepaskan');
    }
}