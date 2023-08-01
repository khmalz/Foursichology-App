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

        $adminPermissions = [
            'laporan_access',
            'laporan_edit',
            'guru_access',
            'guru_manage',
            'siswa_access',
            'siswa_manage',
        ];

        $siswaPermission = [
            'laporan_access',
            'laporan_create'
        ];

        $guruPermission = [
            'laporan_access',
            'laporan_edit',
            'siswa_access',
        ];

        $kepsekPermission = [
            'laporan_access',
            'siswa_access',
        ];

        $allPermission = array_unique(array_merge($adminPermissions, $siswaPermission, $guruPermission, $kepsekPermission));

        foreach ($allPermission as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $role = Role::create(['name' => 'Admin']);
        foreach ($adminPermissions as $permission) {
            $role->givePermissionTo($permission);
        }
        $role = Role::create(['name' => 'Kepala Sekolah']);

        foreach ($kepsekPermission as $permission) {
            $role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'Guru']);

        foreach ($guruPermission as $permission) {
            $role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'Siswa']);
        foreach ($siswaPermission as $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
