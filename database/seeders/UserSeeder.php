<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $users = [
                [
                    'name' => 'Pius Shungu',
                    'email' => 'shungupius@gmail.com',
                    'password' => Hash::make('shungu'),
                    'type' => 'Adminstrator',
                    
                ],

                [
                    'name' => 'Root Administrator',
                    'email' => 'shungupius@youlead.com',
                    'password' => Hash::make('YouLead'),
                    'type' => 'Administrator',
                ],
            ];

            foreach ($users as $user) {

                $type = $user['type'];

                $role = null;

                $finder = ['email' => $user['email']];

                if ($type === "Adminstrator")
                {
                    $role = Role::ADMINSTRATOR;
                }
                 elseif ($type === "Teacher")
                {
                    $role = Role::TEACHER;

                }
                elseif ($type === "Headmistress")
                {

                $role = Role::HEADMISTRESS;

                }
                else
                {

                $role = Role::HEADMASTER;

                }

                $user = User::updateOrCreate($finder, $user);

                if ($user->roles->count() === 0) 
                {
                    $roles = Role::where('name', $type)->get();

                    //$user->removeRole($role);

                    $user->save();

                    $user->assignRole($roles);

                    $user->save();
                }
            }
        });
    }
}
