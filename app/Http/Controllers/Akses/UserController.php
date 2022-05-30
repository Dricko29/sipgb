<?php

namespace App\Http\Controllers\Akses;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Akses\User\StoreUserRequest;
use App\Http\Requests\Akses\User\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('akses.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('akses.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $user->assignRole($request->role);
        return to_route('users.index')->with('sukses', 'user berhasil ditambahkan');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index')->with('sukses', 'user berhasil dihapus'); 
    }

    public function userPermissions(User $user)
    {
        $permissions = Permission::all();
        return view('akses.user.userPermissions', compact('user', 'permissions'));
    }

    public function givePermissions(Request $request, User $user)
    {
        $user->givePermissionTo($request->permission);
        return back()->with('sukses', 'permission berhasil diterapkan');
    }

    public function revokePermissions(User $user, Permission $permission)
    {
        $user->revokePermissionTo($permission);
        return back()->with('sukses', 'permission berhasil dilepaskan');
    }
    
    public function userRoles(User $user)
    {
        $roles = Role::all();
        return view('akses.user.userRoles', compact('user', 'roles'));
    }

    public function assignRoles(Request $request, User $user)
    {
        $user->assignRole($request->role);
        return back()->with('sukses', 'role berhasil diterapkan');
    }

    public function removeRoles(User $user, Role $role)
    {
        $user->removeRole($role);
        return back()->with('sukses', 'role berhasil dilepaskan');
    }
}