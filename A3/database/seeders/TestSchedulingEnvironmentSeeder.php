<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\SchedulingEnvironment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSchedulingEnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scheduling_environment = new SchedulingEnvironment();
        $scheduling_environment->course_id = 1;
        $scheduling_environment->instructor_id = 6;
        $scheduling_environment->date_scheduling = '2024-01-29';
        $scheduling_environment->initial_hour = '7:00 ';
        $scheduling_environment->final_hour = '12:00 ';
        $scheduling_environment->environment_id = 1;
        $scheduling_environment->save();
    }
}
