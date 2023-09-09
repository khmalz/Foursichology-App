<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{

    public function definition()
    {
        $jurusanOptions = ['akl 1', 'akl 2', 'bdp 1', 'bdp 2', 'otkp 1', 'otkp 2', 'dkv', 'rpl'];
        $kelasOptions = ['10', '11', '12'];

        return [
            'jurusan' => fake()->randomElement($jurusanOptions),
            'kelas' => fake()->randomElement($kelasOptions),
            'gender' => rand(0, 1) ? "L" : "P"
        ];
    }
}
