<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\QueryBuilder\QueryBuilder;
// use Spatie\Permission\Models\Role;
use App\Models\Role;
use Illuminate\Support\Facades\DB;


class RolesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:Can view All Roles|Can Create Role|Can Edit Role|Can Delete Role', ['only' => ['index','showRole', 'createRole', 'storeNewRole', 'destroyRole']]);
         $this->middleware('permission:Can Create Role', ['only' => ['createRole','storeNewRole']]);
         $this->middleware('permission:Can Edit Role', ['only' => ['editRole','updateRole']]);
         $this->middleware('permission:Can Delete Role', ['only' => ['destroyRole']]);
    }

    public function index()
    {
        $roles = Role::orderBy('name','ASC')->filter(request(['search']))
        
        ->paginate(10)->withQueryString();

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

    public function showRole($id)
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
