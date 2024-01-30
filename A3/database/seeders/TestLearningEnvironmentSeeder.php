<?php

namespace Database\Seeders;

use App\Models\LearningEnvironment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestLearningEnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $learning_environment = new LearningEnvironment();
        $learning_environment->name ='Sala 205';
        $learning_environment->capacity = 24;
        $learning_environment->area_mt2 = null;
        $learning_environment->floor = 2;
        $learning_environment->inventory = 'computadores, televisor';
        $learning_environment->type_id = 8;
        $learning_environment->location_id = 4;
        $learning_environment->status = 'Activo';
        $learning_environment->save();

    }
}
