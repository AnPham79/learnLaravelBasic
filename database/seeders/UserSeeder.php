<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator;
use App\Models\user;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Admin',
            'level' => 0,
            'email' => 'admin@gmail.com',
            'password' => '123'
        ];

        user::create($data);

        $data = [
            'name' => 'Super Admin',
            'level' => 1,
            'email' => 'sadmin@gmail.com',
            'password' => '123'
        ];

        user::create($data);
    }
}
