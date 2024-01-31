<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   $career = Career::find(5);
        $course = new Course();
        $course->code = 2980102;
        $course->shift ='Mixta';
        $course->career_id = $career->id;
        $course->initial_date ='2023-07-10';
        $course->final_date = '2024-10-20';
        $course->status = 'Lectiva';
        $course->save();
         
    }
}
