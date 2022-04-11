<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;


class RolesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:Can view All Roles|Can Create Role|Can Edit Role|Can Delete Role', ['only' => ['index','show', 'create', 'store', 'destroy']]);
         $this->middleware('permission:Can Create Role', ['only' => ['create','store']]);
         $this->middleware('permission:Can Edit Role', ['only' => ['edit','update']]);
         $this->middleware('permission:Can Delete Role', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::orderBy('name','ASC')->filter(request(['search']))
        
        ->paginate(10)->withQueryString();

        $permissions = Permission::all();

        return view('roles.index', compact('roles', 'permissions'));
    }

    public function create()
    {
        $permission = Permission::get();

        return view('roles.index', compact('permission'));
    }

    public function store()
    {
        $roleValidate = request()->validate([

            'name' => 'required|',
            'permission' => 'required',
        ]);
        
        $role = Role::create(['name' => request()->get('name')]);

        $permission = Permission::find(request()->get('permission'));

        $role->syncPermissions($permission);

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

    public function update(Request $request, $id)
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

    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();

        return redirect('/roles')->with('success','Role deleted successfully');
    }


}
