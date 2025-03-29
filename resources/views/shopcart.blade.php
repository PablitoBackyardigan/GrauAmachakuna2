@extends('layouts.plantilla')

@section('title', 'Carrito de Compra')

@section('titulo', 'CARRITO DE COMPRA')

@push('styles')
    @vite(['resources/css/shopcart.css'])
@endpush

@section('content')
<section class="contenido">
    <div class="columna">
        <h3 class="titulo-caja">Carrito de Compras</h3>

        <div class="cart-item">
            <img src="https://images-cdn.ubuy.pe/654d3c4c9abeb565732bf994-starlink-v2-satellite-dish-kit-with.jpg" alt="Starlink">
            <div class="details">
                <h4>STARLINK</h4>
                <p>Kit de internet Satelital SpaceX Starlink Mini de alta velocidad y baja latencia, conecta hasta 128 dispositivos...</p>
            </div>
            <div class="price">S/749.90</div>
            <div class="quantity">
                <button>-</button>
                <span>1</span>
                <button>+</button>
            </div>
            <div class="total">Total: S/749.90</div>
            <div class="delete">🗑</div>
        </div>

        <div class="cart-item">
            <img src="https://images-cdn.ubuy.pe/654d3c4c9abeb565732bf994-starlink-v2-satellite-dish-kit-with.jpg" alt="Starlink">
            <div class="details">
                <h4>STARLINK</h4>
                <p>Kit de internet Satelital SpaceX Starlink Mini de alta velocidad y baja latencia, conecta hasta 128 dispositivos...</p>
            </div>
            <div class="price">S/749.90</div>
            <div class="quantity">
                <button>-</button>
                <span>1</span>
                <button>+</button>
            </div>
            <div class="total">Total: S/749.90</div>
            <div class="delete">🗑</div>
        </div>

        <div class="cart-item">
            <img src="https://images-cdn.ubuy.pe/654d3c4c9abeb565732bf994-starlink-v2-satellite-dish-kit-with.jpg" alt="Starlink">
            <div class="details">
                <h4>STARLINK</h4>
                <p>Kit de internet Satelital SpaceX Starlink Mini de alta velocidad y baja latencia, conecta hasta 128 dispositivos...</p>
            </div>
            <div class="price">S/749.90</div>
            <div class="quantity">
                <button>-</button>
                <span>1</span>
                <button>+</button>
            </div>
            <div class="total">Total: S/749.90</div>
            <div class="delete">🗑</div>
        </div>
    </div>
    <div class="columna">
        <h3 class="titulo-caja">Resumen de Compra</h3>
        <div class="caja2">
            <h1>Total</h1>   
            <button type="submit">Proceder al Pago</button>  
        </div>
    </div>
</section>  
@endsection
