@extends('layouts.plantilla')

@section('title', 'Zonas disponibles')
@section('titulo', 'Selecciona una Zona para Evaluar')

@push('styles')
    @vite(['resources/css/indexProduct.css', 'resources/css/selectZone.css'])
@endpush

@section('content')
    <section class="grid-container">
        @foreach ($zones as $zone)
            <div class="cardproduct">
                <a href="{{ route('productos.zona', $zone->id) }}">
                    <div class="text">
                        <h3 class="h3">{{ $zone->name }}</h3>
                        <p class="p">Vacantes: {{ $zone->vacancies }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </section>
@endsection
