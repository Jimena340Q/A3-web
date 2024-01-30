<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $location = new Location();
        $location->name = 'Bicentenario';
        $location->address = 'Calle 28 # 19 -38 C';
        $location->status = 'Activo';
        $location->save();
    }
}
