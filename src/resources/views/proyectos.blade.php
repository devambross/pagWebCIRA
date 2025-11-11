@extends('layouts.app')

@section('title', 'CIRA - Proyectos')

@section('styles')
<style>
    .projects-intro {
        text-align: center;
        margin-bottom: 3rem;
    }

    .projects-intro h2 {
        font-size: 2rem;
        color: #2c5f2d;
        margin-bottom: 1rem;
    }

    .projects-intro p {
        max-width: 800px;
        margin: 1rem auto;
        line-height: 1.8;
        color: #666;
    }

    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .project-card {
        background: #f8f9fa;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .project-card-image {
        height: 280px;
        background-size: cover;
        background-position: center;
    }

    .project-card-content {
        padding: 1.5rem;
        text-align: center;
    }

    .project-card h3 {
        color: #2c5f2d;
        margin-bottom: 0.5rem;
        font-size: 1.25rem;
    }

    @media (max-width: 768px) {
        .projects-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
    <!-- Banner Hero -->
    <section class="hero">
        <h1>Proyectos</h1>
    </section>

    <!-- Contenido de Proyectos -->
    <section class="content">
        <div class="projects-intro">
            <h2>Nuestros Proyectos</h2>
            <p>
                Nuestros proyectos están liderados por un equipo de titulares superiores con
                larga experiencia en el sector y atentos a cualquier innovación tecnológica y
                cambio de legislación. Trabajamos bajo las normas de seguridad con el fin de evitar
                accidentes y minimizar sus consecuencias con soluciones eficientes, así como en
                la proposición de medidas para reducir al máximo el impacto ambiental de las
                actividades.
            </p>
        </div>

        <div class="projects-grid">
            <div class="project-card">
                <div class="project-card-image" style="background-image: url('images/cirQulaR.png');"></div>
                <div class="project-card-content">
                    <h3>cirQulaR</h3>
                </div>
            </div>

            <!--<div class="project-card">
                <div class="project-card-image" style="background-image: url('https://images.unsplash.com/photo-1580674285054-bed31e145f59?w=500');"></div>
                <div class="project-card-content">
                    <h3>Minería</h3>
                </div>
            </div>

            <div class="project-card">
                <div class="project-card-image" style="background-image: url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=500');"></div>
                <div class="project-card-content">
                    <h3>Industria</h3>
                </div>
            </div>

            <div class="project-card">
                <div class="project-card-image" style="background-image: url('https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=500');"></div>
                <div class="project-card-content">
                    <h3>Agricultura</h3>
                </div>
            </div>

            <div class="project-card">
                <div class="project-card-image" style="background-image: url('https://images.unsplash.com/photo-1581092160562-40aa08e78837?w=500');"></div>
                <div class="project-card-content">
                    <h3>Saneamiento</h3>
                </div>
            </div>

            <div class="project-card">
                <div class="project-card-image" style="background-image: url('https://images.unsplash.com/photo-1464207687429-7505649dae38?w=500');"></div>
                <div class="project-card-content">
                    <h3>Transporte</h3>
                </div>
            </div>

            <div class="project-card">
                <div class="project-card-image" style="background-image: url('https://images.unsplash.com/photo-1501594907352-04cda38ebc29?w=500');"></div>
                <div class="project-card-content">
                    <h3>Recursos Hídricos</h3>
                </div>
            </div>

            <div class="project-card">
                <div class="project-card-image" style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=500');"></div>
                <div class="project-card-content">
                    <h3>Otros</h3>
                </div>
            </div>-->
        </div>
    </section>
@endsection
