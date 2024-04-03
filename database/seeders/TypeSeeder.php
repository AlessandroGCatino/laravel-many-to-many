<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            "Autonomo",
            "Di Gruppo",
            "Sperimentale",
            "FullStack"
        ];

        foreach($types as $element){
            $new_type = new Type();
            $new_type->name = $element;
            $new_type->save();
        }
    }
}
