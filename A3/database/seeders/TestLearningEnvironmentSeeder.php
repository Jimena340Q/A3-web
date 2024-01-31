<?php

namespace Database\Seeders;

use App\Models\EnvironmentType;
use App\Models\LearningEnvironment;
use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestLearningEnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   $environment_type = EnvironmentType::find(8);
        $location = Location::find(4);
        $learning_environment = new LearningEnvironment();
        $learning_environment->name ='Sala 205';
        $learning_environment->capacity = 24;
        $learning_environment->area_mt2 = null;
        $learning_environment->floor = 2;
        $learning_environment->inventory = 'computadores, televisor';
        $learning_environment->type_id =  $environment_type->id;
        $learning_environment->location_id = $location->id;
        $learning_environment->status = 'Activo';
        $learning_environment->save();

    }
}
