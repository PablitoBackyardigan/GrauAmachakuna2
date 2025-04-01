@extends('layouts.plantilla')

@section('title', 'Productos')

@section('titulo', 'PRODUCTOS')

@push('styles')
    @vite(['resources/css/indexProduct.css', 'resources/css/createProduct.css'])
@endpush

@section('content')

    <section class="filters">
        <!-- Botón para abrir la modal -->
        @can('productos.create')
            <button class="btn" id="openModal">Crear Producto</button>
        @endcan

        <!-- Modal vacía donde cargaremos el formulario -->
        <!-- Modal -->
        <div id="modalCrearProducto" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div id="modalBody">
                    @include('Products.create') <!-- Carga la vista directamente -->
                </div>
            </div>
        </div>        
    </section>

    <section class="products">

        {{-- {{$productos->links()}} --}}


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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("modalCrearProducto");
            const closeModal = document.querySelector(".close");
            const btnOpenModal = document.getElementById("openModal");

            // Asegurar que el modal esté oculto al cargar la página
            modal.classList.remove("show");

            if (!btnOpenModal) return;

            btnOpenModal.addEventListener("click", function (event) {
                event.preventDefault();
                sessionStorage.setItem("modalAbierto", "true");
                modal.classList.add("show"); // Mostrar el modal directamente
            });

            closeModal.addEventListener("click", function () {
                modal.classList.remove("show"); // Oculta el modal
                sessionStorage.removeItem("modalAbierto");
            });

            window.addEventListener("click", function (event) {
                if (event.target === modal) {
                    modal.classList.remove("show");
                    sessionStorage.removeItem("modalAbierto");
                }
            });
        });

    </script>     
    
@endsection
