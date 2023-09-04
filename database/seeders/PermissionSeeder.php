<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $superAdminPermissions = [
            'laporan_access',
            'guru_access',
            'guru_manage',
            'siswa_access',
            'siswa_manage',
        ];

        $adminPermission = [
            'laporan_access',
            'laporan_edit',
            'siswa_access',
        ];

        $siswaPermission = [
            'laporan_access',
            'laporan_create'
        ];

        $allPermission = array_unique(array_merge($superAdminPermissions, $siswaPermission, $adminPermission));

        foreach ($allPermission as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $role = Role::create(['name' => 'super admin']);
        foreach ($superAdminPermissions as $permission) {
            $role->givePermissionTo($permission);
        }
        $role = Role::create(['name' => 'admin']);

        foreach ($adminPermission as $permission) {
            $role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'siswa']);
        foreach ($siswaPermission as $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
