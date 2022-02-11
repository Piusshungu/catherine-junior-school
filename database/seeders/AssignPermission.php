<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AssignPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::pluck('name')->toArray();

        $role = Role::where('name', 'Adminstrator')->get()->first();

        foreach ($permissions as $permission) {

            $permission = Permission::where('name', $permission)->first();

            if(!$role->hasPermissionTo($permission)) {
                
                $role->givePermissionTo($permission);
            }
        }
       
    }
}
