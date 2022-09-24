<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory(1)->create([
            'classroom' => 1,
                'code' => '1Ae5rE8Q'
        ]);

        Student::factory(1)->create([
            'classroom' => 2,
            'code' => '2SY6LSPe'
        ]);

        Student::factory(1)->create([
            'classroom' => 3,
            'code' => '3q9pjI72'
        ]);

        Student::factory(1)->create([
            'classroom' => 4,
            'code' => '4IOps85w'
        ]);

        Student::factory(1)->create([
            'classroom' => 5,
            'code' => '5kRe89E7'
        ]);

//        Student::factory(9)->create([
//            'classroom' => 1,
//        ]);
//
//        Student::factory(9)->create([
//            'classroom' => 2,
//        ]);
//
//        Student::factory(9)->create([
//            'classroom' => 3,
//        ]);
//
//        Student::factory(9)->create([
//            'classroom' => 4,
//        ]);
//
//        Student::factory(9)->create([
//            'classroom' => 5,
//        ]);

    }
}
