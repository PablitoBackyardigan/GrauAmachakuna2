<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $productos = Producto::paginate();

        return view('Products.index', compact('productos'));
    }

    public function create() {
        return view('Products.create');
    }
    
    public function store(Request $request) {
        $producto = new Producto();
    
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->category = $request->category;
        $producto->price = $request->price;
    
        // Guardamos el producto primero para obtener su ID
        $producto->save();
    
        // Si hay una imagen, la subimos
        if ($request->hasFile('productImage')) {
            $fileName = now()->format('Y-m-d_H-i-s') . "_" . $producto->id . "." . $request->file('productImage')->getClientOriginalExtension();
            
            // Mover la imagen a la carpeta pública
            $request->file('productImage')->move(public_path('images/productsPhotos'), $fileName);
    
            // Guardar la ruta en la base de datos
            $producto->update([
                'file_uri' => "images/productsPhotos/" . $fileName,
            ]);
        }
    
        return redirect()->route('productos.show', $producto);
    }    
    
    public function show(Producto $producto){

        return view('Products.show', compact('producto'));

    }

    public function edit(Producto $producto){

        return view('Products.edit', compact('producto'));

    }

    public function update(Request $request, Producto $producto){
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->category = $request->category;
        $producto->price = $request->price;

        $producto->save();
    
        // Si hay una imagen, la subimos
        if ($request->hasFile('productImage')) {
            $fileName = now()->format('Y-m-d_H-i-s') . "_" . $producto->id . "." . $request->file('productImage')->getClientOriginalExtension();
            
            // Mover la imagen a la carpeta pública
            $request->file('productImage')->move(public_path('images/productsPhotos'), $fileName);
    
            // Guardar la ruta en la base de datos
            $producto->update([
                'file_uri' => "images/productsPhotos/" . $fileName,
            ]);
        }

        return redirect()->route('productos.show', $producto);
        
    }

}
