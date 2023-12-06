<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    
    public function run()
    {
        $role_superadmin = Role::updateOrcreate(
            [
                'name' => 'superadmin'
            ],
            ['name' => 'superadmin']
        );

        $role_admin = Role::updateOrcreate(
            [
                'name' => 'admin'
            ],
            ['name' => 'admin']
        );

        $role_guest =  Role::updateOrcreate(
            [
                'name' => 'guest'
            ],
            ['name' => 'guest']
        );

        $permission = Permission::updateOrCreate(
            [
                'name' => 'view_dashboard',
            ],
            ['name' => 'view_dashboard']
        );

        $permission2 = Permission::updateOrCreate(
            [
                'name' => 'view_akses_admin',
            ],
            ['name' => 'view_akses_admin']
        );

        // Cara Untuk Ngasih Permissions Fitur Untuk Role
        $role_superadmin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission2);

        $user = User::find(1);
        $user2 = User::find(2);

        /* Memanggil untuk daftar user yang terverifikasi */
        $user->assignRole('superadmin');
        $user2->assignRole('admin');
    }
}
