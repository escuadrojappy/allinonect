<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        Role::firstOrCreate(
            [
                'id' => 1,
            ],
            [
                'name' => 'Admin',
                'description' => 'Super Admin',
            ]
        );

        Role::firstOrCreate(
            [
                'id' => 2,
            ],
            [
                'name' => 'Establishment',
                'description' => 'Firms',
            ]
        );

        Role::firstOrCreate(
            [
                'id' => 3,
            ],
            [
                'name' => 'Visitor',
                'description' => 'Residents',
            ]
        );
    }
}
