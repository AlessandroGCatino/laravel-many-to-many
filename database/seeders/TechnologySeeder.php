<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            "Html/Css Plain",
            "Bootstrap",
            "JScript Plain",
            "Vue",
            "PHP Plain",
            "Laravel",
            "Vue+Laravel"
        ];

        foreach($types as $element){
            $new_technology = new Technology();
            $new_technology->name = $element;
            $new_technology->save();
        }
    }
}
