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
                    'first_name' => 'Pius',
                    'last_name' => 'Shungu',
                    'email' => 'shungupius@gmail.com',
                    'password' => Hash::make('shungu'),
                    'type' => 'Administrator',
                    'gender' => 'Male',
                    'phone_number' => '0714262024'
                    
                ],

                [
                    'first_name' => 'Root',
                    'last_name' => 'Administrator',
                    'email' => 'shungupius@yahoo.com',
                    'password' => Hash::make('AdminUser'),
                    'type' => 'Administrator',
                    'gender' => 'Male',
                    'phone_number' => '0625568384'
                ],
            ];

            foreach ($users as $user) {

                $type = $user['type'];

                $role = null;

                $finder = ['email' => $user['email']];

                if ($type === "Administrator")
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

                    $user->save();

                    $user->assignRole($roles);

                    $user->save();
                }
            }
        });
    }
}
