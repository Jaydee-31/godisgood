<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\User;


class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        
        $roleIds = [1, 2];
        $userIds = User::pluck('id');

        foreach ($userIds as $userId) {
            if ($userId == 1) {
                User::findOrFail($userId)->roles()->sync([1]); // Assign role ID 1 to the user with ID 1
            } else if ($userId == 2) {
                User::findOrFail($userId)->roles()->sync([2]); // Assign role ID 2 to the user with ID 2
            } else {
                $roleId = Arr::random($roleIds); // Select a random role ID from the $roleIds array
                User::findOrFail($userId)->roles()->sync([$roleId]); // Assign the selected role ID to the user with the given $userId
            }
        }
        
        // User::findOrFail(1)->roles()->sync(1);
        // User::findOrFail(2)->roles()->sync(2);

    }
}
