<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = \App\Models\Categorie::all();

        foreach ($categories as $categorie) {
            for ($i = 1; $i <= 3; $i++) {
                \App\Models\Plat::create([
                    'nom' => $categorie->nom . ' ' . $i,
                    'description' => 'Description du ' . $categorie->nom . ' ' . $i,
                    'prix' => rand(5, 20),
                    'categorie_id' => $categorie->id,
                ]);
            }
        }
    }
}
