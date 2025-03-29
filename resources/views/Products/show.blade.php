@extends('layouts.plantilla')

@section('title', $producto->name)

@section('titulo', 'PRODUCTOS')

@push('styles')
    @vite(['resources/css/showProduct.css'])
@endpush

@section('content')
    <a href="{{Route('productos.index')}}">Volver a productos</a>
    <a href="{{Route('productos.edit', $producto)}}">Editar Producto</a>

    <section class="contenido">
        <div class="producto-container">
            <!-- Contenedor de imágenes -->
            <div class="imagenes-producto">
                <div class="imagen-principal">
                    <img src="{{ asset($producto->file_uri) }}">
                </div>
            </div>
    
            <!-- Descripción del producto -->
            <div class="descripcion-producto">
                <h1 class="titulo-producto">{{$producto->name}}</h1>
                <p class="marca">Marca: Dulces Delicias</p>
                <p class="precio">S/{{$producto->price}}</p>
                <p>
                    {{$producto->description}}
                </p>
    
                <!-- Selector de cantidad -->
                <div class="cantidad-container">
                    <button>-</button>
                    <input type="number" value="1" min="1">
                    <button>+</button>
                </div>
    
                <!-- Botón Agregar al Carrito -->
                <button class="boton-agregar">Agregar al Carrito</button>
            </div>
        </div>
    </section>
@endsection