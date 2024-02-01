<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Films;

class FilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = \Carbon\Carbon::now();
        Films::create([
            'titre' => 'Avatar',
            'description' => 'filme de avatar',
            'reference' => '1_'.$now,
            'categorie_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Films::create([
            'titre' => 'Cukur',
            'description' => 'Turkish serie',
            'reference' => '2_'.$now,
            'categorie_id' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Films::create([
            'titre' => 'Vampire',
            'description' => 'Vampire serie',
            'reference' => '3_'.$now,
            'categorie_id' => 4,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

    }
}
