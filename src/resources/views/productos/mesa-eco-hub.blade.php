@extends('layouts.app')

@section('title', 'CIRA - Mesa Eco Hub')

@section('styles')
<style>
    .product-detail {
        max-width: 1200px;
        margin: 3rem auto;
        padding: 0 2rem;
    }

    .product-header {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-bottom: 3rem;
    }

    .product-image-container {
        background: #f8f9fa;
        border-radius: 12px;
        overflow: hidden;
        height: 400px;
        position: relative;
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-image-badge {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(44, 95, 45, 0.95), rgba(44, 95, 45, 0.85));
        padding: 1.5rem;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .product-image-price {
        font-size: 2.5rem;
        font-weight: 700;
    }

    .product-image-info {
        text-align: right;
        font-size: 0.9rem;
        opacity: 0.95;
    }

    .product-image-info strong {
        display: block;
        font-size: 1rem;
        margin-bottom: 0.25rem;
    }

    .product-info h1 {
        color: #2c5f2d;
        margin-bottom: 1rem;
        font-size: 2.5rem;
    }

    .product-subtitle {
        color: #666;
        font-size: 1.2rem;
        margin-bottom: 2rem;
    }

    .product-specs {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 10px;
        margin-bottom: 2rem;
    }

    .product-specs h3 {
        color: #2c5f2d;
        margin-bottom: 1rem;
    }

    .specs-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .spec-item {
        padding: 0.75rem;
        background: white;
        border-radius: 5px;
    }

    .spec-label {
        font-weight: 600;
        color: #333;
        display: block;
        margin-bottom: 0.25rem;
    }

    .spec-value {
        color: #666;
    }

    .product-description {
        line-height: 1.8;
        color: #666;
        margin-bottom: 2rem;
    }

    .product-features {
        margin-bottom: 2rem;
    }

    .product-features h3 {
        color: #2c5f2d;
        margin-bottom: 1rem;
    }

    .features-list {
        list-style: none;
        padding: 0;
    }

    .features-list li {
        padding: 0.75rem 0;
        padding-left: 2rem;
        position: relative;
        color: #666;
        border-bottom: 1px solid #e0e0e0;
    }

    .features-list li:before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #2c5f2d;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .btn-back {
        display: inline-block;
        padding: 1rem 2rem;
        background: #2c5f2d;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: 600;
        transition: background 0.3s;
        margin-top: 2rem;
    }

    .btn-back:hover {
        background: #234d23;
    }

    .product-clients {
        margin-top: 3rem;
        padding-top: 3rem;
        border-top: 2px solid #e0e0e0;
    }

    .product-clients h3 {
        color: #2c5f2d;
        margin-bottom: 1rem;
    }

    .clients-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .client-tag {
        padding: 0.5rem 1rem;
        background: #e8f5e9;
        color: #2c5f2d;
        border-radius: 20px;
        font-size: 0.9rem;
    }

    .product-pricing {
        margin-top: 3rem;
        padding-top: 3rem;
        border-top: 2px solid #e0e0e0;
    }

    .product-pricing h3 {
        color: #2c5f2d;
        margin-bottom: 1.5rem;
    }

    .pricing-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .pricing-item {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 10px;
        text-align: center;
    }

    .pricing-label {
        font-size: 0.85rem;
        color: #666;
        margin-bottom: 0.5rem;
        display: block;
    }

    .pricing-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c5f2d;
    }

    .pricing-final {
        background: #2c5f2d;
        color: white;
    }

    .pricing-final .pricing-label {
        color: rgba(255, 255, 255, 0.9);
    }

    .pricing-final .pricing-value {
        color: white;
        font-size: 2.2rem;
    }

    .pricing-note {
        background: #fff3cd;
        padding: 1rem;
        border-radius: 8px;
        border-left: 4px solid #ffc107;
        margin-top: 1rem;
    }

    .pricing-note p {
        margin: 0;
        color: #856404;
        font-size: 0.9rem;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .product-header {
            grid-template-columns: 1fr;
        }

        .specs-grid {
            grid-template-columns: 1fr;
        }

        .product-info h1 {
            font-size: 2rem;
        }

        .pricing-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
    <!-- Banner Hero -->
    <section class="hero">
        <h1>Mesa Eco Hub</h1>
    </section>

    <!-- Contenido del Producto -->
    <section class="product-detail">
        <div class="product-header">
            <div class="product-image-container">
                <!-- Cambia este URL por la imagen real del producto -->
                <img src="/images/mesa_eco.png" alt="Mesa Eco Hub" class="product-image">
                <div class="product-image-badge">
                    <div class="product-image-price">S/510</div>
                    <div class="product-image-info">
                        <strong>152 × 76 cm</strong>
                        70.6 kg | Factor: 1.4
                    </div>
                </div>
            </div>

            <div class="product-info">
                <h1>Mesa Eco Hub</h1>
                <p class="product-subtitle">Mesa Circular Eco Hub</p>

                <div class="product-specs">
                    <h3>Especificaciones Técnicas</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <span class="spec-label">Medidas</span>
                            <span class="spec-value">152 × 76 cm</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Peso Total</span>
                            <span class="spec-value">70.6 kg</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Factor de Transformación</span>
                            <span class="spec-value">1.4</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Ingreso de Madera</span>
                            <span class="spec-value">98.84 kg</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Pérdida de Proceso</span>
                            <span class="spec-value">28.24 kg</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Material</span>
                            <span class="spec-value">Capirona 49.3 kg, Pino pallet 49.54 kg</span>
                        </div>
                    </div>
                </div>

                <div class="product-description">
                    <p>Mesa circular de diseño versátil y robusto, fabricada con madera recuperada. Ideal para bares, terrazas, coworks, lobbies de hoteles y espacios retail que buscan mobiliario sostenible de alta calidad.</p>
                </div>
            </div>
        </div>

        <div class="product-features">
            <h3>Características del Producto</h3>
            <ul class="features-list">
                <li>Diseño circular ideal para encuentros y trabajo colaborativo</li>
                <li>Superficie amplia y resistente</li>
                <li>Estructura estable para uso intensivo</li>
                <li>Acabado protector para uso en interiores y exteriores</li>
                <li>Código QR de trazabilidad ambiental</li>
                <li>Fácil ensamblaje y transporte</li>
            </ul>
        </div>

        <div class="product-clients">
            <h3>Principales Clientes/Destino</h3>
            <div class="clients-tags">
                <span class="client-tag">Bares y terrazas</span>
                <span class="client-tag">Coworks</span>
                <span class="client-tag">Lobbies de hoteles</span>
                <span class="client-tag">Retail en general</span>
            </div>
        </div>

        <div class="product-pricing">
            <h3>Información de Precios</h3>
            <div class="pricing-grid">
                <div class="pricing-item">
                    <span class="pricing-label">CVU (S/)</span>
                    <span class="pricing-value">S/335</span>
                </div>
                <div class="pricing-item">
                    <span class="pricing-label">Precio Piso (CVU + CFu)</span>
                    <span class="pricing-value">S/372</span>
                </div>
                <div class="pricing-item">
                    <span class="pricing-label">Precio Objetivo (+35%)</span>
                    <span class="pricing-value">S/502</span>
                </div>
                <div class="pricing-item pricing-final">
                    <span class="pricing-label">Precio Final</span>
                    <span class="pricing-value">S/510</span>
                </div>
            </div>
            <div class="pricing-note">
                <p><strong>Justificación estratégica y de mercado:</strong> Producto de mayor volumen; combina estructura de capirona con refuerzos de pino pallet. Precio atractivo para espacios de coworking y restaurantes eco.</p>
            </div>
        </div>

        <a href="/productos" class="btn-back">← Volver a Productos</a>
    </section>
@endsection
