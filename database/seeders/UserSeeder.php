<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\{
    User,
    Admin,
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate(
            [
                'email' => 'admin@gmail.com',
            ],
            [
                'email' => 'admin@gmail.com',
                'password' => bcrypt('test@123'),
                'role_id' => 1,
            ]
        );

        Admin::firstOrCreate(
            [
                'user_id' => Arr::get($user, 'id'),
            ],
            [
                'name' => 'Super Admin',
                'address' => 'All in one contact tracing',
            ]
        );
    }
}
