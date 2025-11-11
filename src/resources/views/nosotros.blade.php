@extends('layouts.app')

@section('title', 'CIRA - Quienes Somos')

@section('styles')
<style>
    .about-section {
        margin: 2rem 0;
    }

    .about-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .about-card {
        padding: 2rem;
        background: #f8f9fa;
        border-radius: 10px;
    }

    .about-card-val {
        padding: 2rem;
        background: #e8f5e9;
        border-left: 4px solid #2c5f2d;
        border-radius: 10px;
    }

    .about-card h3 {
        color: #2c5f2d;
        margin-bottom: 1rem;
    }

    .about-card ul {
        list-style: none;
        padding: 0;
    }

    .about-card li {
        padding: 0.5rem 0;
        border-bottom: 1px solid #e0e0e0;
    }

    .about-card li:last-child {
        border-bottom: none;
    }
</style>
@endsection

@section('content')
    <!-- Banner Hero -->
    <section class="hero">
        <h1>Quienes Somos</h1>
    </section>

    <!-- Contenido -->
    <section class="content">
        <div class="about-section">
            <h2 class="section-title">Nuestra comunidad</h2>
            <p class="section-text">
                Somos el Círculo de Innovación y Recuperación Ambiental (C.I.R.A.),
                una comunidad universitaria de la Universidad ESAN comprometida con
                crear soluciones reales frente a los desafíos ambientales y
                sociales de nuestra ciudad.
            </p>
        </div>

        <div class="about-grid">
            <div class="about-card">
                <h3>Propósito</h3>
                <p>Transformar el potencial de lo descartado en valor urbano, social y ambiental,
                    generando impacto medible, empleo digno y cooperación entre universidad, empresa
                    y comunidad.
                </p>
            </div>

            <div class="about-card">
                <h3>Misión</h3>
                <p>Desarrollar soluciones de innovación ambiental que integren economía circular,
                    inclusión laboral y educación aplicada para el desarrollo sostenible de las ciudades.
                </p>
            </div>

            <div class="about-card">
                <h3>Visión</h3>
                <p>Ser un referente universitario en innovación sostenible e inclusión laboral,
                    capaz de transformar recursos, espacios y oportunidades en un nuevo modelo
                    de desarrollo urbano responsable.
                </p>
            </div>

            <div class="about-card-val">
                <h3>Valores</h3>
                <ul>
                    <li>✓ Innovación sostenible</li>
                    <li>✓ Colaboración interdisciplinaria</li>
                    <li>✓ Trazabilidad y transparencia</li>
                    <li>✓ Inclusión laboral</li>
                    <li>✓ Educación con impacto</li>
                    <li>✓ Responsabilidad social y ambiental</li>
                </ul>
            </div>
        </div>

        <!--<div id="registros" class="about-section">
            <h2 class="section-title">Registros de Gestión</h2>
            <p class="section-text">
                Contamos con todas las certificaciones y registros necesarios para garantizar
                la calidad de nuestros servicios.
            </p>
        </div>-->
    </section>
@endsection
