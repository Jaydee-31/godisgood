<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [            
            ['title' => 'admin_access'],
            ['title' => 'user_access'],
            ['title' => 'user_create'],
            ['title' => 'user_edit'],
            ['title' => 'user_update'],
            ['title' => 'user_show'],
            ['title' => 'user_delete'],
            ['title' => 'blog_access'],
            ['title' => 'blog_create'],
            ['title' => 'blog_edit'],
            ['title' => 'blog_update'],
            ['title' => 'blog_show'],
            ['title' => 'blog_delete'],
            ['title' => 'permission_access'],
            ['title' => 'permission_create'],
            ['title' => 'permission_edit'],
            ['title' => 'permission_update'],
            ['title' => 'permission_show'],
            ['title' => 'permission_delete'],
            ['title' => 'role_access'],
            ['title' => 'role_create'],
            ['title' => 'role_edit'],
            ['title' => 'role_update'],
            ['title' => 'role_show'],
            ['title' => 'role_delete'],
           
        ];

        Permission::insert(array_map(function ($permission) {
            return [                'title' => $permission['title'],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }, $permissions));
    }
}
