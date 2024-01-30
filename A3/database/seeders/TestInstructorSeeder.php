<?php

namespace Database\Seeders;

use App\Models\Instructor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestInstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructor = new Instructor();
        $instructor->document = 1061225314;
        $instructor->fullname = 'Elodie Robert';
        $instructor->sena_email = 'elodie@example.com';
        $instructor->personal_email = 'robert06@example.com';
        $instructor->phone = null;
        $instructor->password = 'password';
        $instructor->type = 'Planta';
        $instructor->profile = 'Programador';
        $instructor->save();

        


    }
}
