<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 2,
                'name'           => 'User',
                'email'          => 'user@user.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ];

        $faker = Faker::create();
        
        for ($i = 0; $i < 8; $i++) {
            $users[] = [
                'id'             => $i + 3,
                'name'           => $faker->name(),
                'email'          => $faker->unique()->safeEmail(),
                'password'       => bcrypt($faker->password()),
                'remember_token' => null,
                'created_at'     => $faker->dateTimeBetween('-1 month', 'now'),
                'updated_at'     => now(),
            ];
        }
        
        User::insert($users);
    }
}
