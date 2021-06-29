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

        $user = User::first();
        $user->assignRole($role);

        $permissions = [
            [
                'group_name'  => 'Dashboard',
                'permissions' => [
                    'Dashboard',
                ],
            ],
            [
                'group_name'  => 'User',
                'permissions' => [
                    'User list',
                    'Create user',
                    'Edit user',
                    'Show user',
                    'Delete user',
                ],
            ],
            [
                'group_name'  => 'Role',
                'permissions' => [
                    'Role list',
                    'Create role',
                    'Edit role',
                    'Show role',
                    'Delete role',
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
    }
}
