<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $jurusanOptions = ['akl 1', 'akl 2', 'bdp 1', 'bdp 2', 'otkp 1', 'otkp 2', 'dkv', 'rpl'];
        // $kelasOptions = ['10', '11', '12'];
        // $nama = fake()->name;
        // $namaPenggunaEmail = Str::lower(strtok($nama, ' ') . strtok(' '));

        $this->call([PermissionSeeder::class]);

        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);
        $admin->assignRole('super admin');

        $kepsek = User::create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepsek@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);
        $kepsek->assignRole('admin');

        $guru = User::create([
            'name' => 'Guru BK 1',
            'email' => 'gurubk1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);
        $guru->assignRole('admin');

        $guru = User::create([
            'name' => 'Guru BK 1',
            'email' => 'gurubk2@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);
        $guru->assignRole('admin');

        $siswa = User::create([
            'name' => 'Khairul Akmal',
            'email' => 'akmal@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);
        $siswa->assignRole('siswa');

        $siswa->student()->create([
            'nis' => "11815",
            'jurusan' => 'rpl',
            'kelas' => '12',
            'gender' => 'L',
        ]);
    }
}
