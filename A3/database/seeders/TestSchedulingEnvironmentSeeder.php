<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\LearningEnvironment;
use App\Models\SchedulingEnvironment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSchedulingEnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   $course = Course::find(1);
        $instructor = Instructor::find(6);
        $learning_environment = LearningEnvironment::find(1);

        $scheduling_environment = new SchedulingEnvironment();
        $scheduling_environment->course_id = $course->id;
        $scheduling_environment->instructor_id = $instructor->id;
        $scheduling_environment->date_scheduling = '2024-01-29';
        $scheduling_environment->initial_hour = '7:00 ';
        $scheduling_environment->final_hour = '12:00 ';
        $scheduling_environment->environment_id = $learning_environment->id;
        $scheduling_environment->save();
    }
}
