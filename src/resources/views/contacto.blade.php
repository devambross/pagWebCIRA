@extends('layouts.app')

@section('title', 'CIRA - Contacto')

@section('styles')
<style>
    .contact-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 3rem;
        margin: 3rem 0;
    }

    .contact-info-card {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 10px;
    }

    .contact-info-card h3 {
        color: #2c5f2d;
        margin-bottom: 1.5rem;
    }

    .contact-detail {
        display: flex;
        align-items: start;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .contact-icon {
        font-size: 1.5rem;
        min-width: 30px;
    }

    .contact-form {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 10px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #333;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-family: 'Poppins', sans-serif;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .btn-submit {
        background: #2c5f2d;
        color: white;
        padding: 1rem 2rem;
        border: none;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
        width: 100%;
    }

    .btn-submit:hover {
        background: #234d23;
    }

    .map-container {
        margin: 3rem 0;
        height: 400px;
        background: #f8f9fa;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        position: relative;
    }

    .map-link {
        display: block;
        width: 100%;
        height: 100%;
        position: relative;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .map-link:hover {
        transform: scale(1.02);
    }

    .map-link::after {
        content: '📍 Ver en Google Maps';
        position: absolute;
        bottom: 20px;
        right: 20px;
        background: #2c5f2d;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 5px;
        font-weight: 600;
        font-size: 0.9rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .map-link:hover::after {
        opacity: 1;
    }

    .map-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
</style>
@endsection

@section('content')
    <!-- Banner Hero -->
    <section class="hero">
        <h1>Contacto</h1>
    </section>

    <!-- Contenido -->
    <section class="content">
        <h2 class="section-title">Contáctenos</h2>
        <p class="section-text">
            Estamos a su disposición para atender sus consultas y proyectos.
        </p>

        <div class="contact-container">
            <div class="contact-info-card">
                <h3>Información de Contacto</h3>

                <div class="contact-detail">
                    <div class="contact-icon">📍</div>
                    <div>
                        <strong>Dirección</strong>
                        <p>Calle 7 S/N Villa el Salvador, Villa el Salvador, Lima<br>Lima, Perú</p>
                    </div>
                </div>

                <div class="contact-detail">
                    <div class="contact-icon">📧</div>
                    <div>
                        <strong>Email</strong>
                        <p>info@cira.com</p>
                    </div>
                </div>

                <div class="contact-detail">
                    <div class="contact-icon">📞</div>
                    <div>
                        <strong>Teléfono</strong>
                        <p>+123 456 7890</p>
                    </div>
                </div>

                <div class="contact-detail">
                    <div class="contact-icon">🕐</div>
                    <div>
                        <strong>Horario</strong>
                        <p>Lunes a Viernes<br>08:30 - 17:30</p>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <h3>Envíanos un Mensaje</h3>
                <form action="/contacto" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre completo *</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono">
                    </div>

                    <div class="form-group">
                        <label for="asunto">Asunto *</label>
                        <select id="asunto" name="asunto" required>
                            <option value="">Seleccione un asunto</option>
                            <option value="consulta">Consulta general</option>
                            <option value="proyecto">Nuevo proyecto</option>
                            <option value="cotizacion">Solicitud de cotización</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mensaje">Mensaje *</label>
                        <textarea id="mensaje" name="mensaje" required></textarea>
                    </div>

                    <button type="submit" class="btn-submit">Enviar Mensaje</button>
                </form>
            </div>
        </div>

        <div class="map-container">
            <a href="https://www.google.com/maps/place/-12.2177222,-76.9681111/@-12.2177222,-76.9681111,17z"
               target="_blank"
               rel="noopener noreferrer"
               class="map-link"
               title="Ver ubicación en Google Maps">
                <img src="https://img10.naventcdn.com/ficha/map/Adondevivir/147972670E.png"
                     alt="Ubicación de CIRA en el mapa">
            </a>
        </div>
    </section>
@endsection
