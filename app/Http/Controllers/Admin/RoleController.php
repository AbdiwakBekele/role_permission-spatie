<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.roles.createRole');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $role = new Role;
        $role->name = $request->role_name;
        $role->save();

        if($role->id){
            redirect('/role');
        }
    }

    public function show(string $id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $permissions = Permission::all();
        $role = Role::find($id);
        return view('admin.roles.editRole', compact('role', 'permissions'));
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

    public function assignPermission(Request $request, string $role_id){

        $role = Role::find($role_id);
        if($role->hasPermissionTo($request->assign_permission)){
            echo "Permission Already Exists";
        }else{
            $role->givePermissionTo($request->assign_permission);
            echo "Permission Added";
        }
    }
}