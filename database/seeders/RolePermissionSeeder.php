<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $role = Role::create(['name' => 'Super Admin']);

        $permissions = [
            [
                'group_name'  => 'dashboard',
                'permissions' => [
                    'dashboard',
                ],
            ],
            [
                'group_name'  => 'user',
                'permissions' => [
                    'user list',
                    'create user',
                    'edit user',
                    'show user',
                    'delete user',
                ],
            ],
            [
                'group_name'  => 'role',
                'permissions' => [
                    'role list',
                    'create role',
                    'edit role',
                    'show role',
                    'delete role',
                ],
            ],
        ];

        for ($i = 0; $i < count($permissions); $i++) {
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permission = Permission::create([
                    'name'       => $permissions[$i]['permissions'][$j],
                    'group_name' => $permissions[$i]['group_name'],
                ]);
                $role->givePermissionTo($permission);
            }
        }

        $user = User::first();
        $user->assignRole($role);

    }
}
