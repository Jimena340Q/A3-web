<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\EnvironmentType;
use Database\Factories\InstructorFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CareerSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(EnvironmentTypeSeeder::class);
        $this->call(LocationSeeder::class);



        InstructorFactory::factory()->create([
            'type' => 'Contratista',
            'profile' => 'Matematicas'
        ]);
        InstructorFactory::factory()->create([
            'type' => 'Contratista',
            'profile' => 'Tics'
        ]);

        InstructorFactory::factory()->create([
            'type' => 'Contratista',
            'profile' => 'Fisica'
        ]);

        InstructorFactory::factory()->create([
            'type' => 'Planta',
            'profile' => 'Programación'
        ]);
        InstructorFactory::factory()->create([
            'type' => 'Planta',
            'profile' => 'Ingles'
        ]);

        UserFactory::factory(5) ->create();
      



    }
}
