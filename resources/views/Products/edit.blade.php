@extends('layouts.plantilla')

@section('title', 'Editar ' . $producto->name)

@section('content')

    <h1>Bienvenido a la página de crear productos</h1>

    <form action="{{ route('productos.update', $producto) }}" method="post" enctype="multipart/form-data">

        @csrf

        @method('put')

        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{$producto->name}}"
        </label>

        <br>
        <label>
            Descripción:
            <br>
            <textarea name="description" rows="5">{{$producto->description}}</textarea>
        </label>

        <br>
        <label>
            Categoria:
            <br>
            <input type="text" name="category" value="{{$producto->category}}">
        </label>

        <br>
        <label>
            Precio:
            <br>
            <input type="number" name="price" value="{{$producto->price}}">
        </label>

        <br>
        <label>
            IMAGEN PRODUCTO SUBIR:
            <br>
            <input type="file" class="fileInput" name="productImage" accept=".png, .jpg, .jpeg, .webp, .svg" style="display:none;">
            <button type="button" class="btnSelectFile" onclick="handleFileSelect(this)">Seleccionar archivo .jpg,  .jpeg,  .png</button>
        </label>

        <br>
        <button type="submit"> Actualizar Formulario </button>

    </form>

@endsection
