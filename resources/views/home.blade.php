@extends('layouts.plantilla')

@section('title', 'Home')

@section('titulo', 'Pastelería')
@push('styles')
    @vite(['resources/css/home.css'])
@endpush


@section('content')
    <section class="contenido">

        <div class="nosotros">
            <div class="overlayNosotros">
                <div class="contentNosotros">
                    <h1>SOBRE NOSOTROS</h1>
                    <p>En Pan Comido creemos que la pastelería es un arte que se disfruta con los cinco sentidos. Desde nuestros inicios, nos hemos dedicado a crear experiencias únicas a través de postres delicadamente elaborados, combinando tradición, creatividad y los más finos ingredientes.
        
                        Cada pieza que sale de nuestro obrador es el resultado de una pasión genuina por la repostería, con técnicas artesanales y un cuidado meticuloso en cada detalle. Nos especializamos en tortas elegantes, macarons, tartaletas y una variedad exquisita de pasteles personalizados para eventos inolvidables.
                        
                        En Pan Comido, no solo hacemos postres: creamos momentos memorables.
                        
                        </p>
                </div>
            </div>
        </div>

    </section>
@endsection
