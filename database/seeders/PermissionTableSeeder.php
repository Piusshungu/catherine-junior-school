<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $permissions = [
                [
                    'name' => 'Can View Parents List',
                ],
                [
                    'name' => 'Can View Parent Details',
                ],

                [
                    'name' => 'Can Edit Parent(s) Details',
                ],
                [
                    'name' => 'Can Delete Parent(s) Details',
                ],
                [
                    'name' => 'Can Create Parent',
                ],
                [
                    'name' => 'Can Create Role',
                ],
                [
                    'name' => 'Can Delete Role',
                ],
                [
                    'name'=>'Can Edit Role',
                ],
                [
                    'name'=>'Can view All Roles',
                ]
            ];

            foreach ($permissions as $permission) {

                $finder = ['name' => $permission['name']];

                if (!Permission::where($finder)->exists()) {
                    
                    Permission::create($permission);
                }
            }
        });
    }
}
