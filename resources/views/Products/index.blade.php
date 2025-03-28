@extends('layouts.plantilla')

@section('title', 'Productos')

@section('titulo', 'PRODUCTOS')

@push('styles')
    @vite(['resources/css/indexProduct.css'])
@endpush

@section('content')
    <section class="products">

        <a href="{{route('productos.create')}}">Crear Producto</a>

        <!--
        <ul>
            @foreach ($productos as $producto)
                <li>
                    <a href="{{route('productos.show', $producto->id)}}">{{$producto->name}}</a>
                </li>
            @endforeach
        </ul> -->

        {{$productos->links()}}


        <div class="grid-container">
            @foreach ($productos as $producto)
                <div class="cardproduct">

                    <div class="img">
                        <img src="{{$producto->image}}">
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
