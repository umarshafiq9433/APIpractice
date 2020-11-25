<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            Student::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'roll_no' => "SP18-BSE-" . $i
            ]);
        }
    }
}
