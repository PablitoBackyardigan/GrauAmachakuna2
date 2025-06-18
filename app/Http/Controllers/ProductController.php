<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        // Si es un admin (jurado), mostrar listado de zonas
        if ($user->hasRole('Admin')) {
            $zones = Zone::all();
            return view('Products.selectZone', compact('zones'));
        }

        // Si no tiene zona asignada, rechazar acceso
        if (!$user->zone_id) {
            abort(403, 'No tienes una zona asignada.');
        }

        $zone = Zone::findOrFail($user->zone_id);
        $productos = Producto::where('zone_id', $zone->id)->get();

        return view('Products.index', compact('productos', 'zone'));
    }


    public function create() {
        return view('Products.create', compact('productos'));
    }
    
    public function store(Request $request)
    {
        $producto = new Producto();

        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->nameResponsable = $request->nameResponsable;

        // Establecer zone_id del usuario autenticado
        $producto->zone_id = Auth::user()->zone_id;

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

        notify()->success('Avance creado correctamente!');
        return redirect()->route('productos.show', $producto);
    }
    
    public function show(Producto $producto)
    {
        // Pasar el producto y las categorías a la vista
        return view('Products.show', compact('producto',));
    }

    public function edit(Producto $producto)
    {
        return view('Products.edit', compact('producto'))->render();
    }
    

    public function update(Request $request, Producto $producto){
        $producto->name = $request->name;
        $producto->description = $request->description;
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

        notify()->success('Producto editado correctamente!');
        return redirect()->route('productos.show', $producto);
        
    }

    public function destroy(Producto $producto)
    {
        // Eliminar el producto
        $producto->delete();

        notify()->success('Producto eliminado correctamente!');
        // Redirigir a la lista de productos con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }

    public function zona($id)
    {
        $zone = Zone::findOrFail($id);
        $user = Auth::user();

        // Solo admins pueden ver zonas distintas a la suya
        if (!$user->hasRole('Admin') && $user->zone_id !== $zone->id) {
            abort(403, 'No tienes permiso para ver esta zona.');
        }

        $productos = Producto::where('zone_id', $zone->id)->get();

        return view('Products.index', compact('productos', 'zone'));
    }


}
