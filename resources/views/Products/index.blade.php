@extends('layouts.plantilla')

@section('title', 'Productos')

@section('titulo', 'PRODUCTOS')

@push('styles')
    @vite(['resources/css/indexProduct.css'])
@endpush

@section('content')
    <section class="products">

        @can('productos.create')
            <a href="{{route('productos.create')}}">Crear Producto</a>
        @endcan

        {{$productos->links()}}


        <div class="grid-container">
            @foreach ($productos as $producto)
                <div class="cardproduct">

                    <div class="img">
                        <img src="{{ asset($producto->file_uri) }}">
                    </div>
                
                    <div class="text">
                        <a class="h3" href="{{route('productos.show', $producto->id)}}">{{$producto->name}}</a>
                        <p class="p"> S/. {{$producto->price}} </p>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endsection
