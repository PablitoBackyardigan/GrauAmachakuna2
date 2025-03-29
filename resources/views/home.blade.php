@extends('layouts.plantilla')

@section('title', 'Home')

@section('titulo', 'PASTELERIA')
@push('styles')
    @vite(['resources/css/home.css'])
@endpush


@section('content')
    <section class="contenido">
            
        <div class="section1">
            <img src="images/QuienesSomos.jpg">
        </div>

        <div class="section2">
            <div class="texto1">
                <h2> ¿Quienes somos? </h2>
                <p> En Pastelería, somos apasionados por el arte de la pastelería. Con años de experiencia y un equipo de expertos reposteros, 
                    combinamos tradición e innovación para crear postres y pasteles de la más alta calidad.</p>
                <p> Nos especializamos en recetas artesanales elaboradas con ingredientes frescos y seleccionados, garantizando un sabor único 
                    en cada bocado. Desde elegantes tortas de boda hasta delicados macarons y postres personalizados, nuestra misión es endulzar
                    cada momento especial de nuestros clientes.</p>
            </div>
        </div>

    </section>
@endsection
