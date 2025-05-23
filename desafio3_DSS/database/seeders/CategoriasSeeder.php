<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriaModel::create(['nombre' => 'Computadoras']);
        CategoriaModel::create(['nombre' => 'Smartphones']);
        CategoriaModel::create(['nombre' => 'Accessorios']);
    }
}
