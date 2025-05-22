<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\DB;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Data apa saja yang akan diinputkan harus ada permissionnya
        $permissions = [
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials',
            'manage clients',
            'manage teams',
            'manage abouts',
            'manage appointments',
            'manage hero sections',
        ];

        //Mengatur nama ... mempunya permission apa
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                [
                    'name' => $permission
                ]
            );
        }

        //Membuat role superadmin
        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        //Membuat role admin bernama ...
        $user = User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('superadmin')
        ]);
        //Dimana user .. mempunyai role Super Admin
        $user->assignRole($superAdminRole);

        $designManagerRole = Role::firstOrCreate([
            'name' => 'design_manager'
        ]);
        $designManagerPermissions = [
            'manage products',
            'manage principles',
            'manage testimonials',
        ];
        $designManagerRole->syncPermissions($designManagerPermissions);
    }
}
