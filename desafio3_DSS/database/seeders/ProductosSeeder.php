<?php

namespace Database\Seeders;

use App\Models\ProductoModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductoModel::create([
            'nombre' => 'Laptop Lenovo IdeaPad Slim 5 (2025)',
            'precio' => 699.99,
            'stock' => 15,
            'imagen' => 'laptopLenovo.jpg',
            'categoria_id' => 1,
        ]);

        ProductoModel::create([
            'nombre' => 'PC Gamer Alienware Aurora R15',
            'precio' => 999.99,
            'stock' => 10,
            'imagen' => 'pcAlienware.png',
            'categoria_id' => 1,
        ]);

        ProductoModel::create([
            'nombre' => 'HP ProDesk 400 G9 SFF',
            'precio' => 499.99,
            'stock' => 5,
            'imagen' => 'hpDesk.png',
            'categoria_id' => 1,
        ]);

        ProductoModel::create([
            'nombre' => 'iPhone 15 Pro Max',
            'precio' => 1199.99,
            'stock' => 8,
            'imagen' => 'iphone.png',
            'categoria_id' => 2,
        ]);

        ProductoModel::create([
            'nombre' => 'Smartphone Samsung Galaxy S24 Ultra',
            'precio' => 899.99,
            'stock' => 20,
            'imagen' => 's24ultra.jpg',
            'categoria_id' => 2,
        ]);

        ProductoModel::create([
            'nombre' => 'Xiaomi 14 Pro',
            'precio' => 899.99,
            'stock' => 20,
            'imagen' => 'xiaomi14.jpeg',
            'categoria_id' => 2,
        ]);

        ProductoModel::create([
            'nombre' => 'Mouse Logitech MX Master 3S',
            'precio' => 99.99,
            'stock' => 100,
            'imagen' => 'mouseLogitech.jpg',
            'categoria_id' => 3,
        ]);

        ProductoModel::create([
            'nombre' => 'Teclado Mecánico Razer BlackWidow V4',
            'precio' => 129.99,
            'stock' => 50,
            'imagen' => 'tecladoRazer.jpg',
            'categoria_id' => 3,
        ]);

        ProductoModel::create([
            'nombre' => 'Audífonos Sony WH-1000XM5',
            'precio' => 349.99,
            'stock' => 30,
            'imagen' => 'audifonosSony.jpeg',
            'categoria_id' => 3,
        ]);
    }
}
