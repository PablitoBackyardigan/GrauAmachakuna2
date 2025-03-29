<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producto = new Producto();

        $producto->name = "Torta de Chocolate";
        $producto->description = "Deliciosa torta bañada en chocolate negro";
        $producto->category = "Tortas";
        $producto->price = 23;
        $producto->file_uri = "images/torta_chocolate.jpg";
        $producto->save();

        $producto2 = new Producto();

        $producto2->name = "Torta de 3 leches";
        $producto2->description = "Deliciosa torta bañada en 3 leches";
        $producto2->category = "Tortas";
        $producto2->price = 20;
        $producto2->file_uri = "images/torta_3leches.jpg";

        $producto2->save();
    }
}
