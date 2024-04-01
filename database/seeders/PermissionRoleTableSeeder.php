<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        $user_permissions = [
            Permission::where('title', 'blog_access')->first()->id,
            Permission::where('title', 'blog_create')->first()->id,
            Permission::where('title', 'blog_edit')->first()->id,
            Permission::where('title', 'blog_update')->first()->id,
            Permission::where('title', 'blog_show')->first()->id,
            Permission::where('title', 'blog_delete')->first()->id,
        ];

        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }

    // public function run()
    // {
    //     $admin_permissions = Permission::all();
    //     Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
    //     $user_permissions = $admin_permissions->filter(function ($permission) {
    //         return substr($permission->title, 0, 5) != 'user_' && $permission->title != 'admin_access';
    //     });
    //     Role::findOrFail(2)->permissions()->sync($user_permissions);
    // }
}
