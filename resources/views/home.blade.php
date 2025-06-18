@extends('layouts.plantilla')

@section('title', 'Home')


@push('styles')
    @vite(['resources/css/home.css'])
@endpush


@section('content')

    <section id="inicio" class="hero">
        <div class="hero-content">
            <h1>Grau Amachakuna</h1>
            <p>Únete a nuestra comunidad y adopta un espacio del Parque Grau. Juntos mantendremos nuestro parque limpio, hermoso y lleno de vida.</p>
            <a href="#registro" class="cta-button">¡Adopta tu Espacio Ahora!</a>
        </div>
    </section>

    <section id="como-funciona" class="how-it-works">
        <div class="container">
            <h2 class="section-title">¿Cómo Funciona?</h2>
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Regístrate</h3>
                    <p>Completa el formulario de registro con tus datos personales y elige el área del parque que deseas adoptar.</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Adopta tu Espacio</h3>
                    <p>Selecciona una zona específica del Parque Grau y comprométete a mantenerla limpia y decorada durante el período acordado.</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Participa y Compite</h3>
                    <p>Mantén tu área en perfectas condiciones y participa en nuestras competencias mensuales para ganar increíbles premios.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="competencia" class="competition">
        <div class="container">
            <h2 class="section-title">Competencias y Premios</h2>
            <p style="text-align: center; font-size: 1.2rem; margin-bottom: 3rem; color: #666;">
                Cada mes premiamos a los grupos que mejor mantengan sus áreas adoptadas
            </p>
            <div class="competition-grid">
                <div class="prize-card">
                    <div class="prize-icon">🥇</div>
                    <h3>Primer Lugar</h3>
                    <p><strong>S/. 500</strong> en efectivo + Certificado de reconocimiento + Cobertura en medios locales</p>
                </div>
                <div class="prize-card">
                    <div class="prize-icon">🥈</div>
                    <h3>Segundo Lugar</h3>
                    <p><strong>S/. 300</strong> en efectivo + Kit de jardinería + Certificado de participación</p>
                </div>
                <div class="prize-card">
                    <div class="prize-icon">🥉</div>
                    <h3>Tercer Lugar</h3>
                    <p><strong>S/. 200</strong> en efectivo + Plantas ornamentales + Certificado de participación</p>
                </div>
                <div class="prize-card">
                    <div class="prize-icon">🌟</div>
                    <h3>Mención Especial</h3>
                    <p>Reconocimiento público + Kit de limpieza + Invitación a evento especial</p>
                </div>
            </div>
            <div style="text-align: center; margin-top: 3rem;">
                <h3 style="color: #2d5016; margin-bottom: 1rem;">Criterios de Evaluación</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; max-width: 800px; margin: 0 auto;">
                    <div style="background: #f0f8f0; padding: 1rem; border-radius: 10px;">
                        <strong>Limpieza</strong><br>
                        <small>Estado general del área</small>
                    </div>
                    <div style="background: #f0f8f0; padding: 1rem; border-radius: 10px;">
                        <strong>Decoración</strong><br>
                        <small>Creatividad y belleza</small>
                    </div>
                    <div style="background: #f0f8f0; padding: 1rem; border-radius: 10px;">
                        <strong>Mantenimiento</strong><br>
                        <small>Constancia en el cuidado</small>
                    </div>
                    <div style="background: #f0f8f0; padding: 1rem; border-radius: 10px;">
                        <strong>Innovación</strong><br>
                        <small>Ideas originales</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
