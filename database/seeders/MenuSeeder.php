<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Categorie::create(['nom' => 'Entrées']);
        \App\Models\Categorie::create(['nom' => 'Plats principaux']);
        \App\Models\Categorie::create(['nom' => 'Desserts']);
        \App\Models\Categorie::create(['nom' => 'Boissons']);
    }
}
