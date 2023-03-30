<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'        => 1,
                'title'     => 'admin_access',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'        => 2,
                'title'     => 'user_access',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'        => 3,
                'title'     => 'blog_access',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ];

        Permission::insert($permissions);
    }
}
