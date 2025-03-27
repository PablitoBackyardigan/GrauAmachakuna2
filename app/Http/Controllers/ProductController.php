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
    
    public function show($id){

        $producto = Producto::find($id);

        return view('Products.show', compact('producto'));
    }
}
