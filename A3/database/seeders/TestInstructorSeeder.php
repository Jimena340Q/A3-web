<?php

namespace Database\Seeders;

use App\Models\Instructor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class TestInstructorSeeder extends Seeder

{
    protected static ?string $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
   
    {   
        $instructor = new Instructor();
        $instructor->document = 1061225314;
        $instructor->fullname = 'Elodie Robert';
        $instructor->sena_email = fake() ->unique()->safeEmail();
        $instructor->personal_email = fake() ->unique()->safeEmail();
        $instructor->phone = null;
        $instructor->password = static::$password ??= Hash::make('password');
        $instructor->type = 'Planta';
        $instructor->profile = 'Programador';
        $instructor->save();

        


    }
}
