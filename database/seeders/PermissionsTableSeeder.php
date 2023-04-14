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
                'title'     => 'user_create',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'        => 4,
                'title'     => 'user_edit',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'        => 5,
                'title'     => 'user_show',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'        => 6,
                'title'     => 'blog_access',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'        => 7,
                'title'     => 'blog_create',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'        => 8,
                'title'     => 'blog_edit',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'        => 9,
                'title'     => 'blog_show',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'        => 10,
                'title'     => 'blog_delete',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'    => 11,
                'title' => 'permission_create',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'    => 12,
                'title' => 'permission_edit',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'    => 13,
                'title' => 'permission_show',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'    => 14,
                'title' => 'permission_delete',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'    => 15,
                'title' => 'permission_access',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'    => 16,
                'title' => 'role_create',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'    => 17,
                'title' => 'role_edit',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'    => 18,
                'title' => 'role_show',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'    => 19,
                'title' => 'role_delete',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'id'    => 20,
                'title' => 'role_access',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ];

        Permission::insert($permissions);
    }
}
