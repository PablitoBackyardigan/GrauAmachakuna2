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

        $producto->name = "Avance 1";
        $producto->description = "Descripción del avance 1";
        $producto->nameResponsable = "Responsable 1";
        $producto->zone_id = 1;
        $producto->file_uri = "images/Avance1.webp";
        $producto->save();

        $producto2 = new Producto();

        $producto2->name = "Avance 2";
        $producto2->description = "Descripción del avance 2";
        $producto2->nameResponsable = "Responsable 2";
        $producto2->zone_id = 1;
        $producto2->file_uri = "images/Avance2.webp";

        $producto2->save();

        $producto3 = new Producto();

        $producto3->name = "Avance 3";
        $producto3->description = "Descripción del avance 3";
        $producto3->nameResponsable = "Responsable 3";
        $producto3->zone_id = 1;
        $producto3->file_uri = "images/Avance3.webp";

        $producto3->save();

        $producto4 = new Producto();

        $producto4->name = "Avance 4";
        $producto4->description = "Descripción del avance 4";
        $producto4->nameResponsable = "Responsable 4";
        $producto4->zone_id = 1;
        $producto4->file_uri = "images/Avance4.webp";

        $producto4->save();

        $producto5 = new Producto();

        $producto5->name = "Avance 5";
        $producto5->description = "Descripción del avance 5";
        $producto5->nameResponsable = "Responsable 5";
        $producto5->zone_id = 1;
        $producto5->file_uri = "images/Avance5.webp";

        $producto5->save();

        $producto6 = new Producto();
        $producto6->name = "Avance 6";
        $producto6->description = "Descripción del avance 6";
        $producto6->nameResponsable = "Responsable 6";
        $producto6->zone_id = 1;
        $producto6->file_uri = "images/Avance6.webp";

        $producto6->save();
        
    }
}
