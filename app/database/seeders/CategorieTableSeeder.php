<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;


class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = \Carbon\Carbon::now();
        Categories::create([
            'genre' => 'Horror',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Categories::create([
            'genre' => 'Comedy',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Categories::create([
            'genre' => 'Romance',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Categories::create([
            'genre' => 'Action',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
