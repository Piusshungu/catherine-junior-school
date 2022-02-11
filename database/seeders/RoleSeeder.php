<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $roles = [
                [
                    'name' => 'Head Master',
                ],
                [
                    'name' => 'Adminstrator',
                ],

                [
                    'name' => 'Teacher',
                ],

                [
                    'name' => 'Head Mistress',
                ],

            ];

            foreach ($roles as $role) {
                $finder = ['name' => $role['name']];
                Role::updateOrCreate($finder, $role);
            }
        });
    }
}
