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

        $this->call(PermissionSeeder::class);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);
        $admin->assignRole('Admin');

        $kepsek = User::create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepsek@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);
        $kepsek->assignRole('Kepala Sekolah');

        $guru = User::create([
            'name' => 'Guru A',
            'email' => 'guru1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);
        $guru->assignRole('Guru');

        $guru = User::create([
            'name' => 'Guru B',
            'email' => 'guru2@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);
        $guru->assignRole('Guru');
    }
}
