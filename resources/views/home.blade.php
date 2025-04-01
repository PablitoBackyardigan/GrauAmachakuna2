@extends('layouts.plantilla')

@section('title', 'Home')

@section('titulo', 'PASTELERIA')
@push('styles')
    @vite(['resources/css/home.css'])
@endpush


@section('content')
    <section class="contenido">
            
        <div class="container-historia">

            <div class="imagen-historia">
                <img src="{{ asset('images/pastel1.jpg') }}" >
            </div>

            <div class="content">
                <h2>Nuestra Historia</h2>
                <p>Desde 2010, Dulce Delicia ha estado creando pasteles y postres artesanales con los ingredientes más frescos y de la más alta calidad. Nuestra pasión por la repostería nos ha convertido en la opción preferida para celebraciones y momentos especiales.</p>
                <p>Cada producto es elaborado con amor y atención al detalle, siguiendo recetas tradicionales con un toque moderno que nos distingue.</p>
                <a href="#" class="button">Conocer Más</a>
            </div>
        </div>

        <div class"resenas">
            <div class="container-resena">
                <div class="title">Lo Que Dicen Nuestros Clientes</div>
                <div class="testimonials">
                    <div class="testimonial">
                        <div class="stars">★★★★★</div>
                        <div class="text">"Los pasteles de Dulce Delicia son simplemente increíbles. El sabor, la textura y la presentación son perfectos. Siempre son el centro de atención en nuestras celebraciones."</div>
                        <div class="client">Cliente 1</div>
                    </div>
                    <div class="testimonial">
                        <div class="stars">★★★★★</div>
                        <div class="text">"Los pasteles de Dulce Delicia son simplemente increíbles. El sabor, la textura y la presentación son perfectos. Siempre son el centro de atención en nuestras celebraciones."</div>
                        <div class="client">Cliente 2</div>
                    </div>
                    <div class="testimonial">
                        <div class="stars">★★★★★</div>
                        <div class="text">"Los pasteles de Dulce Delicia son simplemente increíbles. El sabor, la textura y la presentación son perfectos. Siempre son el centro de atención en nuestras celebraciones."</div>
                        <div class="client">Cliente 3</div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
