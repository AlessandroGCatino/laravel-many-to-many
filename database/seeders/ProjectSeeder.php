<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i=0; $i<10; $i++){
            $newProject = new Project();
            $newProject->title = $faker->word();
            $newProject->description = $faker->text();
            $newProject->languages = $faker->words($nb = 3, $asText = true);
            $newProject->save();
        }
    }
}
