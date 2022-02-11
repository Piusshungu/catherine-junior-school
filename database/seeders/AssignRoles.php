<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AssignRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('type', 'Adminstrator')->get();

        $role= Role::where('name', 'Adminstrator')->first();

        foreach ($users as $user) {

            if (!$user->hasRole($role)) {
                
                $user->assignRole($role);
            }
            
        }
    }
    
}
