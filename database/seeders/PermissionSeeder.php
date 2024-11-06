<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::updateorcreate(
            [
                'name' => 'admin'
            ],

            ['name' => 'admin']


        );
        $role_user = Role::updateorcreate(
            [
                'name' => 'user'
            ],

            ['name' => 'user']


        );

        $permissionDashboar = Permission::updateOrCreate(
            [
                'name' => 'view_dashboard'
            ],

            ['name' => 'view_dashboard']


        );

        $role_admin->givePermissionTo($permissionDashboar);

        $user =User::find(1);

        $user->assignRole('admin');







    }
}
