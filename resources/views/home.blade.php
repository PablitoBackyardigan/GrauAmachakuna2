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
                    <p>
                      En Pan Comido convertimos la pastelería en arte, combinando tradición, creatividad y los mejores ingredientes. Cada postre es elaborado con técnicas artesanales y atención al detalle, ofreciendo tortas elegantes, macarons, tartaletas y pasteles personalizados que hacen de cada momento algo memorable.
                    </p>
                </div>
            </div>
        </div>

        <div class="container">

          <!-- Sección de Opiniones -->
          <div class="contenido-opiniones">
            <h1 class="titulo-opiniones">Opiniones</h1>

            @foreach ($opiniones as $opinion)
              <div class="opiniones">
                <div class="task">
                  <div class="encabezado">
                    <div class="usuario">
                      <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="usuario"/>
                      <span>{{ $opinion->user->name ?? 'Usuario anónimo' }}</span> <!-- Nombre del usuario -->
                    </div>
                    <div class="fecha">{{ $opinion->created_at ? $opinion->created_at->format('d M Y') : 'Fecha no disponible' }}</div> <!-- Fecha de la opinión -->
                  </div>
                  <div class="estrellas">
                    @for ($i = 0; $i < $opinion->estrellas; $i++)
                      ★
                    @endfor
                  </div>
                  <p>{{ $opinion->opiniontext }}</p>
                </div>
              </div>
            @endforeach

          </div>

            <!-- Formulario para enviar mensaje -->
            <h2 class="form-titulo">Enviar mensaje</h2>
            <form class="formulario">
              <div class="form-container">
                <div class="mensaje">
                  <label for="mensaje">Mensaje</label>
                  <textarea id="mensaje" placeholder="Escribe tu mensaje..." required></textarea>
                </div>
                <div class="datos">
                  <label for="nombre">Tu nombre</label>
                  <input type="text" id="nombre" placeholder="Tu nombre" required />
                  
                  <label for="correo">Tu correo</label>
                  <input type="email" id="correo" placeholder="Tu correo" required />
                  
                  <label for="telefono">Tu teléfono</label>
                  <input type="tel" id="telefono" placeholder="Tu teléfono" required />
                </div>
              </div>
              <button type="submit">Enviar</button>
            </form>
          </div>

          <!-- Sección de Mapa -->
          <div class="mapa">
            <h2>Ubicación</h2>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0933024023593!2d-122.42177868468116!3d37.77492977975924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085815046dd0d87%3A0xd54152f05b99e853!2sPanadería%20Ejemplo!5e0!3m2!1ses-419!2scl!4v1618302733962!5m2!1ses-419!2scl"
              width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
          </div>

          </div>


    </section>
@endsection
