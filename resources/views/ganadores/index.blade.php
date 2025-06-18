@extends('layouts.plantilla')

@section('title', 'Ganadores')
@section('titulo', 'Ganadores de la Semana')

@push('styles')
    @vite(['resources/css/ganadores.css'])
@endpush

@section('content')

    <h2 class="titulo-semana">🎖 Podio de la Semana Actual</h2>

    @if ($topZonasSemanaActual->isNotEmpty())
        <div class="premios-container">
            @foreach ($topZonasSemanaActual as $index => $zona)
                <div class="premio-card">
                    <div class="medalla-icono">
                        @if ($index === 0)
                            🥇
                        @elseif ($index === 1)
                            🥈
                        @elseif ($index === 2)
                            🥉
                        @endif
                    </div>

                    <h3 class="puesto">
                        @if ($index === 0)
                            Primer Lugar
                        @elseif ($index === 1)
                            Segundo Lugar
                        @elseif ($index === 2)
                            Tercer Lugar
                        @endif
                    </h3>

                    <p class="zona-nombre">Zona: <strong>{{ $zona->name }}</strong></p>
                    <p>Promedio: {{ number_format($zona->promedio, 2) }}</p>

                    <p class="recompensa">
                        @if ($index === 0)
                            <strong>S/. 500</strong> en efectivo + Certificado de reconocimiento + Cobertura en medios locales
                        @elseif ($index === 1)
                            <strong>S/. 300</strong> en efectivo + Kit de jardinería + Certificado de participación
                        @elseif ($index === 2)
                            <strong>S/. 200</strong> en efectivo + Plantas ornamentales + Certificado de participación
                        @endif
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <p>No hay puntuaciones registradas esta semana.</p>
    @endif


    <h2 class="titulo-semana">🥈 Podio de la Semana Pasada</h2>

    @if ($topZonasSemanaPasada->isNotEmpty())
        <div class="premios-container">
            @foreach ($topZonasSemanaPasada as $index => $zona)
                <div class="premio-card">
                    <div class="medalla-icono">
                        @if ($index === 0)
                            🥇
                        @elseif ($index === 1)
                            🥈
                        @elseif ($index === 2)
                            🥉
                        @endif
                    </div>

                    <h3 class="puesto">
                        @if ($index === 0)
                            Primer Lugar
                        @elseif ($index === 1)
                            Segundo Lugar
                        @elseif ($index === 2)
                            Tercer Lugar
                        @endif
                    </h3>

                    <p class="zona-nombre">Zona: <strong>{{ $zona->name }}</strong></p>
                    <p>Promedio: {{ number_format($zona->promedio, 2) }}</p>

                    <p class="recompensa">
                        @if ($index === 0)
                            <strong>S/. 500</strong> en efectivo + Certificado de reconocimiento + Cobertura en medios locales
                        @elseif ($index === 1)
                            <strong>S/. 300</strong> en efectivo + Kit de jardinería + Certificado de participación
                        @elseif ($index === 2)
                            <strong>S/. 200</strong> en efectivo + Plantas ornamentales + Certificado de participación
                        @endif
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <p>No hubo puntuaciones registradas la semana pasada.</p>
    @endif

@endsection
