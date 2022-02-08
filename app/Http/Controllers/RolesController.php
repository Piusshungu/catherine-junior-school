<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class RolesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','storeNewRole']]);
         $this->middleware('permission:role-create', ['only' => ['createRole','storeRole']]);
         $this->middleware('permission:role-edit', ['only' => ['editRole','updateRole']]);
         $this->middleware('permission:role-delete', ['only' => ['destroyRole']]);
    }

    public function index()
    {
        $roles = Role::orderBy('id','DESC')->paginate(10)->withQueryString();

        return view('roles.index', compact('roles'));
    }

    public function createRole()
    {
        $permission = Permission::get();

        return view('roles.create', compact('permission'));
    }

    public function storeRole()
    {
        $role = request()->validate([

            'name' => 'required|unique,roles,name',
            'permission' => 'required',
        ]);

        $saveRole = Role::create($role);

        $saveRole->syncPermissions(request()->input('permission'));

        return redirect('/roles')->with('success', 'Role successfully added to the Database');
    }

    public function show($id)
    {
        $role = Role::find($id);

        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")

            ->where("role_has_permissions.role_id",$id)

            ->get();
    
        return view('roles.show',compact('role','rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::find($id);

        $permission = Permission::get();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)

            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')

            ->all();
    
        return view('roles.edit',compact('role','permission','rolePermissions'));
    }

    public function updateRole(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);

        $role->name = $request->input('name');

        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect('/roles')->with('success','Role updated successfully');
    }

    public function destroyRole($id)
    {
        DB::table("roles")->where('id',$id)->delete();

        return redirect('/roles')->with('success','Role deleted successfully');
    }


}
