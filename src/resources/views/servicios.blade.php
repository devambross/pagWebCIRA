@extends('layouts.app')

@section('title', 'CIRA - Servicios')

@section('styles')
<style>
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .service-card {
        padding: 2rem;
        background: #f8f9fa;
        border-radius: 10px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
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
</style>
@endsection

@section('content')
    <!-- Banner Hero -->
    <section class="hero">
        <h1>Servicios</h1>
    </section>

    <!-- Contenido -->
    <section class="content">
        <h2 class="section-title">Nuestros Servicios</h2>
        <p class="section-text">
            Ofrecemos una amplia gama de servicios ambientales especializados para diferentes sectores.
        </p>

        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">📋</div>
                <h3>Estudios Ambientales</h3>
                <ul>
                    <li>Evaluación de Impacto Ambiental</li>
                    <li>Declaración de Impacto Ambiental</li>
                    <li>Estudios de Línea Base</li>
                    <li>Monitoreo Ambiental</li>
                </ul>
            </div>

            <div class="service-card">
                <div class="service-icon">🔬</div>
                <h3>Consultoría Ambiental</h3>
                <ul>
                    <li>Asesoría en normativa ambiental</li>
                    <li>Planes de manejo ambiental</li>
                    <li>Auditorías ambientales</li>
                    <li>Gestión de residuos</li>
                </ul>
            </div>

            <div class="service-card">
                <div class="service-icon">🌍</div>
                <h3>Sostenibilidad</h3>
                <ul>
                    <li>Huella de carbono</li>
                    <li>Reportes de sostenibilidad</li>
                    <li>Certificaciones ambientales</li>
                    <li>Economía circular</li>
                </ul>
            </div>

            <div class="service-card">
                <div class="service-icon">💧</div>
                <h3>Recursos Hídricos</h3>
                <ul>
                    <li>Estudios hidrológicos</li>
                    <li>Calidad de agua</li>
                    <li>Tratamiento de aguas</li>
                    <li>Gestión de cuencas</li>
                </ul>
            </div>

            <div class="service-card">
                <div class="service-icon">🏭</div>
                <h3>Industria</h3>
                <ul>
                    <li>Gestión de emisiones</li>
                    <li>Control de contaminación</li>
                    <li>Eficiencia energética</li>
                    <li>Producción más limpia</li>
                </ul>
            </div>

            <div class="service-card">
                <div class="service-icon">📊</div>
                <h3>Capacitación</h3>
                <ul>
                    <li>Cursos especializados</li>
                    <li>Talleres ambientales</li>
                    <li>Formación in-house</li>
                    <li>Certificaciones</li>
                </ul>
            </div>
        </div>
    </section>
@endsection
