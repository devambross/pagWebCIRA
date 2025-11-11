@extends('layouts.app')

@section('title', 'CIRA - Aliados')

@section('styles')
<style>
    .clients-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .client-card {
        padding: 2rem;
        background: #f8f9fa;
        border-radius: 10px;
        text-align: center;
        transition: transform 0.3s;
    }

    .client-card:hover {
        transform: translateY(-5px);
    }

    .client-logo {
        height: 100px;
        width: 100%;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
    }

    .sectors {
        margin: 3rem 0;
    }

    .sector-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .sector-item {
        padding: 1.5rem;
        background: #e8f5e9;
        border-left: 4px solid #2c5f2d;
        border-radius: 5px;
    }

    .sector-item h4 {
        color: #2c5f2d;
        margin-bottom: 0.5rem;
    }
</style>
@endsection

@section('content')
    <!-- Banner Hero -->
    <section class="hero">
        <h1>Aliados</h1>
    </section>

    <!-- Contenido -->
    <section class="content">
        <h2 class="section-title">Nuestros Aliados</h2>
        <p class="section-text">
            Cada socio aporta un valor diferente: las empresas privadas proporcionan materia prima
            (madera en desuso y logística de entrega), las municipalidades facilitan espacios e incentivos,
            y la universidad ESAN lidera la coordinación técnica, académica y de voluntariado.
            El proyecto se concibe como una red colaborativa de economía circular urbana,
            donde todos los actores obtienen beneficios tangibles: ahorro de costos, mejora de reputación,
            trazabilidad ambiental y participación en proyectos con certificación verde.
        </p>

        <div class="clients-grid">
            <div class="client-card">
                <div class="client-logo" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIzm7nc_eqxIY7D-pCbLADw4FhiajMXqTYhw&s');"></div>
                <h3>D’Lorens</h3>
            </div>

            <div class="client-card">
                <div class="client-logo" style="background-image: url('https://grupoimcesa.com.pe/wp-content/uploads/2023/11/lgooim-1.webp');"></div>
                <h3>IMCESA</h3>
            </div>

            <div class="client-card">
                <div class="client-logo" style="background-image: url('images/Dlineas.jpg');"></div>
                <h3>D’Lineas</h3>
            </div>

            <div class="client-card">
                <div class="client-logo" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3EqzC5YBfon_5ojQ8U3SVx5YWzvOhqo-qSg&s');"></div>
                <h3>Classic Internacional</h3>
            </div>

            <div class="client-card">
                <div class="client-logo" style="background-image: url('https://artely.com.br/site/wp-content/uploads/2020/08/logo-menu-e1751476533406.jpg');"></div>
                <h3>Artely</h3>
            </div>

            <div class="client-card">
                <div class="client-logo" style="background-image: url('https://lirp.cdn-website.com/60617cdc/dms3rep/multi/opt/Atica_ArteFinalLogo-7-60b3eae4-237w.png'); background-color: #000;"></div>
                <h3>Atica</h3>
            </div>

            <div class="client-card">
                <div class="client-logo" style="background-image: url('images/citemadera_logo.jpeg');"></div>
                <h3>CITEmadera</h3>
            </div>

        </div>

        <!--<div class="sectors">
            <h2 class="section-title">Sectores que Atendemos</h2>
            <div class="sector-list">
                <div class="sector-item">
                    <h4>Sector Minero</h4>
                    <p>Estudios de impacto ambiental, monitoreo de calidad de agua y aire.</p>
                </div>

                <div class="sector-item">
                    <h4>Sector Energético</h4>
                    <p>Evaluaciones ambientales para proyectos de generación eléctrica.</p>
                </div>

                <div class="sector-item">
                    <h4>Sector Industrial</h4>
                    <p>Gestión de residuos, auditorías ambientales y certificaciones.</p>
                </div>

                <div class="sector-item">
                    <h4>Sector Agrícola</h4>
                    <p>Gestión sostenible de recursos, certificaciones orgánicas.</p>
                </div>

                <div class="sector-item">
                    <h4>Sector Construcción</h4>
                    <p>Planes de manejo ambiental, gestión de residuos de construcción.</p>
                </div>

                <div class="sector-item">
                    <h4>Sector Público</h4>
                    <p>Asesoría en políticas ambientales y desarrollo sostenible.</p>
                </div>
            </div>
        </div>-->
    </section>
@endsection
