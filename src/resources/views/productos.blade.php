@extends('layouts.app')

@section('title', 'CIRA - Productos')

@section('styles')
<style>
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .service-card {
        padding: 0;
        background: #f8f9fa;
        border-radius: 10px;
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .service-image {
        width: 100%;
        height: 200px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-color: #e0e0e0;
        position: relative;
    }

    .service-price {
        position: absolute;
        bottom: 0;
        right: 0;
        background: #2c5f2d;
        color: white;
        padding: 0.75rem 1.5rem;
        font-size: 1.5rem;
        font-weight: 700;
        border-top-left-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .service-content {
        padding: 2rem;
    }

    .service-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .service-card h3 {
        color: #2c5f2d;
        margin-bottom: 1rem;
    }

    .service-card ul {
        list-style: none;
        padding: 0;
        color: #666;
    }

    .service-card li {
        padding: 0.5rem 0;
        padding-left: 1.5rem;
        position: relative;
    }

    .service-card li:before {
        content: "→";
        position: absolute;
        left: 0;
        color: #2c5f2d;
    }

    .service-description {
        color: #666;
        margin-top: 1rem;
        font-size: 0.9rem;
    }
</style>
@endsection

@section('content')
    <!-- Banner Hero -->
    <section class="hero">
        <h1>Productos</h1>
    </section>

    <!-- Contenido -->
    <section class="content">
        <h2 class="section-title">Nuestros Productos</h2>
        <p class="section-text">
            Ofrecemos una amplia gama de productos especializados para diferentes sectores.
        </p>

        <div class="services-grid">
            <a href="/productos/banca-urban" class="service-card">
                <div class="service-image" style="background-image: url('images/banca_urban.png');">
                    <div class="service-price">S/470</div>
                </div>
                <div class="service-content">
                    <h3>Banca Urban</h3>
                    <p class="service-description">Banca Eco Urbana cirQulaR - 50 × 94 × 180 cm</p>
                    <ul>
                        <li>Municipalidades</li>
                        <li>Parques y malls</li>
                        <li>Campus universitarios</li>
                    </ul>
                </div>
            </a>

            <a href="/productos/jardinera-eco" class="service-card">
                <div class="service-image" style="background-image: url('images/jardinera_eco.png');">
                    <div class="service-price">S/590</div>
                </div>
                <div class="service-content">
                    <h3>Jardinera Eco</h3>
                    <p class="service-description">Jardinera Modular Eco cirQulaR - 60 × 80 × 120 cm</p>
                    <ul>
                        <li>Parques y municipios</li>
                        <li>Hoteles y centros comerciales</li>
                        <li>Universidades</li>
                    </ul>
                </div>
            </a>

            <a href="/productos/banca-lounge" class="service-card">
                <div class="service-image" style="background-image: url('images/banca_lounge.png');">
                    <div class="service-price">S/420</div>
                </div>
                <div class="service-content">
                    <h3>Banca Lounge</h3>
                    <p class="service-description">Banca Eco Lounge Home&Co - 45 × 70 × 150 cm</p>
                    <ul>
                        <li>Restaurantes y cafés</li>
                        <li>Coworks y hoteles</li>
                        <li>Espacios comunales</li>
                    </ul>
                </div>
            </a>

            <a href="/productos/mesa-eco-hub" class="service-card">
                <div class="service-image" style="background-image: url('images/mesa_eco.png');">
                    <div class="service-price">S/510</div>
                </div>
                <div class="service-content">
                    <h3>Mesa Eco Hub</h3>
                    <p class="service-description">Mesa Circular Eco Hub - 152 × 76 cm</p>
                    <ul>
                        <li>Bares y terrazas</li>
                        <li>Coworks y lobbies</li>
                        <li>Retail en general</li>
                    </ul>
                </div>
            </a>
        </div>
    </section>
@endsection
