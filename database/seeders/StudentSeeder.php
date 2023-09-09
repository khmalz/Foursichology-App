<?php

namespace Database\Seeders;

use App\Models\ReportImages;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Khairul Akmal',
            'email' => 'akmal@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole('siswa');

        $student = $user->student()->create([
            'nis' => "11814",
            'jurusan' => 'rpl',
            'kelas' => '12',
            'gender' => 'L',
        ]);

        $report = $student->reports()->create([
            'description' => fake()->text(),
            'anonim' => rand(0, 1),
        ]);

        for ($j = 0; $j < rand(1, 5); $j++) {
            ReportImages::create([
                'report_id' => $report->id,
                'path' => "placeholder"
            ]);
        }

        $tahunMasuk = date('y');
        for ($i = 1; $i <= 10; $i++) {
            $siswa = User::factory()->create();
            $siswa->assignRole('siswa');

            $nomorUrut = str_pad($i, 3, '0', STR_PAD_LEFT);
            $nis = $tahunMasuk . $nomorUrut;

            $student = Student::factory()->create([
                'user_id' => $siswa->id,
                'nis' => $nis,
            ]);

            $report = $student->reports()->create([
                'description' => fake()->text(),
                'anonim' => rand(0, 1),
            ]);

            for ($j = 0; $j < rand(1, 5); $j++) {
                ReportImages::create([
                    'report_id' => $report->id,
                    'path' => "placeholder"
                ]);
            }
        }
    }
}
