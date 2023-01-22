<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(is_null($this->user)){
            abort(403, 'Sorry !! You are Unauthorized to view roles page !');
        }
        $roles = Role::all();
        return view('backend.pages.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(is_null($this->user)){
            abort(403, 'Sorry !! You are Unauthorized to create role !');
        }

        return view('backend.pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|max:255'
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->slug = Str::slug($request->name);
        $role->guard_name = 'Admin';
        $role->save();

        $rolePermissions = explode(',',$request->permissions);
        foreach ($rolePermissions as $permissionKey => $permission) {
            $permissions = new Permission();
            $permissions->name = $permission;
            $permissions->slug = Str::slug($permission);
            $permissions->save();

            $role->permissions()->attach($permissions->id);
        }

        return redirect()->route('admin.roles.index');
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
        $role = Role::findOrFail($id);
        $rolePermissions = $role->permissions;

        return view('backend.pages.roles.edit',compact('role','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $request->validate([
            'name'  => 'required|max:255'
        ]);

        $role->name = $request->name;
        $role->slug = Str::slug($request->name);
        $role->guard_name = 'Admin';
        $role->save();
        $role->permissions()->detach();
        $role->permissions()->delete();
        $rolePermissions = explode(',',$request->permissions);
        foreach ($rolePermissions as $permissionKey => $permission) {
            $permissions = new Permission();
            $permissions->name = $permission;
            $permissions->slug = Str::slug($permission);
            $permissions->save();

            $role->permissions()->attach($permissions->id);
        }

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->permissions()->delete();
        $role->delete();
        $role->permissions()->detach();

        return redirect()->back();
    }
}
