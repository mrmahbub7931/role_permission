<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
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
        if (is_null($this->user)) {
            abort(403, 'Sorry !! You are Unauthorized to view roles page !');
        }
        $users = Admin::all();
        return view('backend.pages.admins.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (is_null($this->user)) {
            abort(403, 'Sorry !! You are Unauthorized to view roles page !');
        }
        if ($request->ajax()) {
            $role = Role::where('id', $request->role_id)->first();
            return $role->permissions;
        }
        $roles = Role::all();
        return view('backend.pages.admins.create', compact('roles'));
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
            'name' => 'required|max:255',
            'email' =>  'required|unique:admins',
            'password' => 'required|min:8',
            'role'  => 'required'
        ]);

        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->role != null) {
            $user->roles()->attach($request->role);
            $user->save();
        }

        foreach ($request->permissions as $permission) {
            $user->adminPermissions()->attach($permission);
            $user->save();
        }

        return redirect()->route('admin.admins.index');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Admin::findOrFail($id);
        $user->adminPermissions()->delete();
        $user->delete();
        $user->adminPermissions()->detach();

        return redirect()->back();
    }
}
