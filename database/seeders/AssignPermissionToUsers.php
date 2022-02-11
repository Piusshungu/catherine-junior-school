<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class AssignPermissionToUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('type', 'Adminstrator')->get();

        $permissions = Permission::pluck('name')->toArray();

        foreach ($users as $user) {

            foreach ($permissions as $permission) {

                $permission = Permission::where('name', $permission)->first();

                if (!$user->hasPermissionTo($permission)) {
                    
                    $user->givePermissionTo($permission);
                }
            }
        }
    }
}