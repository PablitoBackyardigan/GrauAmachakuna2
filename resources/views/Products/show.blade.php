@extends('layouts.plantilla')

@section('title', $producto->name)

@section('content')
    <h1>Bienvenido al producto {{$producto->name}} </h1>
    <a href="{{Route('productos.index')}}">Volver a productos</a>
    <p><strong>Categoria: </strong> {{$producto->category}} </p>
    <p> {{$producto->description}} </p>
@endsection