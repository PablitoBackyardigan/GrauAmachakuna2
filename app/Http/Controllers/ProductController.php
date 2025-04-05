<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Producto::select('category')->distinct()->pluck('category');
    
        $query = Producto::query();
    
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
    
        $productos = $query->paginate();
    
        return view('Products.index', compact('productos', 'categorias'));
    }    

    public function create() {
        $productos = Producto::select('category')->distinct()->get();
        
        return view('Products.create', compact('productos'));
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
    
    public function show(Producto $producto)
    {
        // Obtener todas las categorías únicas de productos
        $categorias = Producto::pluck('category')->unique();
        
        // Pasar el producto y las categorías a la vista
        return view('Products.show', compact('producto', 'categorias'));
    }

    public function edit(Producto $producto)
    {
        // Si necesitas pasar categorías a la vista, asegúrate de obtenerlas
        $categorias = Producto::pluck('category')->unique();
    
        return view('Products.edit', compact('producto', 'categorias'))->render();
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
