@extends('layouts.app')

@section('title', 'CIRA - Inicio')

@section('styles')
<style>
    .hero-home {
        margin-top: 70px;
        height: 600px;
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                    url('https://img10.naventcdn.com/avisos/resize/111/01/47/97/13/13/1200x1200/1567787571.jpg?rapc=bXZhX2ltYWdl') center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
    }

    .hero-content h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .hero-content p {
        font-size: 1.25rem;
        margin-bottom: 2rem;
    }

    .btn-primary {
        display: inline-block;
        padding: 1rem 2rem;
        background: #2c5f2d;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: 600;
        transition: background 0.3s;
    }

    .btn-primary:hover {
        background: #234d23;
    }

    .features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 4rem 0;
    }

    .feature-card {
        text-align: center;
        padding: 2rem;
        background: #f8f9fa;
        border-radius: 10px;
    }

    .feature-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .feature-card h3 {
        color: #2c5f2d;
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 2rem;
        }

        .hero-content p {
            font-size: 1rem;
        }
    }
</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-home">
        <div class="hero-content">
            <h1>Bienvenido a CIRA</h1>
            <p>Círculo de Innovación y Recuperación Ambiental</p>
            <a href="/contacto" class="btn-primary">Contáctanos</a>
        </div>
    </section>

    <!-- Características -->
    <section class="content">
        <h2 class="section-title">¿Por qué elegirnos?</h2>
        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">🌱</div>
                <h3>Responsabilidad social y ambiental</h3>
                <p>Cada decisión busca equilibrio entre beneficio humano, ecológico y económico.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3>Innovación</h3>
                <p>Diseñamos soluciones que combinan creatividad, técnica y medición de impacto</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">✅</div>
                <h3>Trazabilidad y transparencia</h3>
                <p>Incorporamos tecnología QR para monitorear y comunicar resultados reales.</p>
            </div>
        </div>
    </section>
@endsection
