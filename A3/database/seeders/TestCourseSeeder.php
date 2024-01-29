<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = new Course();
        $course->code = 9080102;
        $course->shift ='Mixta';
        $course->career_id = $course->id;
        $course->initial_date =
        $course->save();
         
    }
}
