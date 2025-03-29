@extends('layouts.plantilla')

@section('title', 'Productos Crear')

@section('content')

    <h1>Bienvenido a la página de crear productos</h1>

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="name">
        </label>

        <br>
        <label>
            Descripción:
            <br>
            <textarea name="description" rows="5"></textarea>
        </label>

        <br>
        <label>
            Categoria:
            <br>
            <input type="text" name="category">
        </label>

        <br>
        <label>
            Precio:
            <br>
            <input type="number" name="price">
        </label>

        <br>
        <label>
            IMAGEN PRODUCTO SUBIR (Haz click en este texto xd):
            <br>
            <input type="file" class="fileInput" name="productImage" accept=".png, .jpg, .jpeg, .webp, .svg" style="display:none;">
            <button type="button" class="btnSelectFile" onclick="handleFileSelect(this)">Seleccionar archivo .jpg,  .jpeg,  .png</button>
        </label>

        <br>
        <button type="submit"> Enviar Formulario </button>

    </form>

@endsection
