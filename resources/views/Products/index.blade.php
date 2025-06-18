@extends('layouts.plantilla')

@section('title', 'Avances - ' . $zone->name)

@section('titulo', 'Avances - ' . $zone->name)


@push('styles')
    @vite(['resources/css/indexProduct.css', 'resources/css/createProduct.css'])
@endpush

@section('content')

    <button class="btn" id="openModal">Subir Avance</button>

    <div id="modalCrearProducto" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modalBody">
                @include('Products.create') <!-- Carga la vista directamente -->
            </div>
        </div>
    </div>

    <section class="products">

        <div class="grid-container">
            @foreach ($productos as $producto)

                <div class="cardproduct">
                    <a href="{{route('productos.show', $producto->id)}}">
                        <div class="img">
                            <img src="{{ asset($producto->file_uri) }}">
                        </div>
                    
                        <div class="text">
                            <h3 class="h3">{{$producto->name}}</h3>
                            <p class="p"> {{$producto->nameResponsable}} </p>
                        </div>
                    </a>
                </div>

            @endforeach
        </div>

    </section>

    <section class="formulario-puntaje">   
        @role('Admin')
        <form action="{{ route('zones.score', $zone->id) }}" method="POST">
            @csrf
            <label for="score" class="score-form__label">Califica esta zona:</label>
            <input type="number" name="score" id="score" min="1" max="10" required
                value="{{ optional($zone->scores->where('user_id', auth()->id())->first())->score }}" class="score-form__input">
            <button type="submit" class="score-form__button">Guardar puntaje</button>
        </form>
        @endrole
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
