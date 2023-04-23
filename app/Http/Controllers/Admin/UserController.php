<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $users = User::all();
        return view('admin.user.viewUser', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $user = User::find($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.editUser', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function assignRole(Request $request, string $user_id){
        $user = User::find($user_id);
        if($user->hasRole($request->assign_role)){
            echo "Role Already Exists";
        }else{
            $user->assignRole($request->assign_role);
            return back();
        }
    }

    public function assignPermission(Request $request, string $user_id){

        $user = User::find($user_id);
        if($user->hasPermissionTo($request->assign_permission)){
            echo "Permission Already Exists";
        }else{
            $user->givePermissionTo($request->assign_permission);
            echo "Permission Added";
        }
    }
    
}