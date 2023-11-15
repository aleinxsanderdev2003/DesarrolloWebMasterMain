<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create([
            'nombre' => 'Plataforma de Pedidos en Línea para Restaurantes',
            'descripcion' => 'Descripción corta del producto 1.',
            'precio' => 5.00,
            'imagen' => 'yumi.jpeg', // Ajusta el nombre de la imagen según tu estructura
            'categoria_id' => 1, // Ajusta el ID de la categoría según tu base de datos
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Product::create([
            'nombre' => 'Producto 2',
            'descripcion' => 'Descripción corta del producto 2.',
            'precio' => 15.00,
            'imagen' => 'chiphy.jpeg', // Ajusta el nombre de la imagen según tu estructura
            'categoria_id' => 2, // Ajusta el ID de la categoría según tu base de datos
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Product::create([
            'nombre' => 'Producto 3',
            'descripcion' => 'Descripción corta del producto 3.',
            'precio' => 10.00,
            'imagen' => 'viser.jpeg', // Ajusta el nombre de la imagen según tu estructura
            'categoria_id' => 3, // Ajusta el ID de la categoría según tu base de datos
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Agrega más registros según sea necesario
    }
}
