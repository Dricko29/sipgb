<?php

namespace App\Http\Controllers\Akses;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\Akses\Permission\StorePermissionRequest;
use App\Http\Requests\Akses\Permission\UpdatePermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('akses.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akses.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        Permission::create($request->validated());
        return to_route('permissions.index')->with('sukses', 'permission berhasil ditambahkan');
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
    public function edit(Permission $permission)
    {
        return view('akses.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        return to_route('permissions.index')->with('sukses', 'permission berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return to_route('permissions.index')->with('sukses', 'permission berhasil dihapus');
    }

    public function permissionRoles(Permission $permission)
    {  
        $roles = Role::all();
        return view('akses.permission.permissionRoles', compact('permission', 'roles'));
    }

    public function assignRoles(Request $request, Permission $permission)
    {
        $permission->assignRole($request->role);
        return back()->with('sukses', 'role berhasil diterapkan');
    }

    public function removeRoles(Permission $permission, Role $role)
    {
        $permission->removeRole($role);
        return back()->with('sukses', 'role berhasil dilepaskan');
    }
}