<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CIRA')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            background: #e1a6471c;
        }

        /* Header fijo */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .logo img {
            height: 50px;
            width: auto;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #2c5f2d;
            padding: 0.5rem;
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1001;
        }

        .nav {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
            padding: 0.5rem 1rem;
        }

        .nav a:hover,
        .nav a.active {
            color: #2c5f2d;
            text-decoration: underline;
        }

        /* Banner hero */
        .hero {
            margin-top: 70px;
            height: 400px;
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
                        url('https://www.ue.edu.pe/pregrado/images/2025%20pregrado/Blog%20UE%2016.png') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
        }

        /* Contenido principal */
        .content {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 0 2rem;
        }

        .section-title {
            font-size: 2rem;
            color: #2c5f2d;
            margin-bottom: 1rem;
            text-align: center;
        }

        .section-text {
            max-width: 800px;
            margin: 1rem auto;
            line-height: 1.8;
            color: #666;
            text-align: center;
        }

        /* Footer */
        .footer {
            background: #1a1a1a;
            color: #fff;
            padding: 3rem 2rem 1rem;
            margin-top: 4rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section h4 {
            color: #2c5f2d;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .footer-section p,
        .footer-section a {
            color: #ccc;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            line-height: 1.6;
        }

        .footer-section a:hover {
            color: #2c5f2d;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #333;
            color: #999;
            font-size: 0.9rem;
        }

        .contact-info {
            display: flex;
            align-items: start;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }

            .nav {
                position: fixed;
                top: 70px;
                left: 0;
                right: 0;
                background: #fff;
                flex-direction: column;
                gap: 0;
                padding: 1rem 0;
                box-shadow: 0 5px 10px rgba(0,0,0,0.1);
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }

            .nav.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }

            .nav li {
                width: 100%;
            }

            .nav a {
                display: block;
                padding: 1rem 2rem;
                border-bottom: 1px solid #f0f0f0;
            }

            .hero h1 {
                font-size: 2rem;
                padding: 0 1rem;
            }

            .header-container {
                padding: 1rem;
            }

            .logo img {
                height: 40px;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Header fijo -->
    <header class="header">
        <div class="header-container">
            <a href="/" class="logo">
                <img src="{{ asset('images/CIRA.png') }}" alt="CIRA Logo">
            </a>
            <button class="menu-toggle" id="menuToggle">☰</button>
            <nav>
                <ul class="nav" id="navMenu">
                    <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Inicio</a></li>
                    <li><a href="/nosotros" class="{{ request()->is('nosotros') ? 'active' : '' }}">Quienes Somos</a></li>
                    <!--<li><a href="/servicios" class="{{ request()->is('servicios') ? 'active' : '' }}">Servicios</a></li>-->
                    <li><a href="/proyectos" class="{{ request()->is('proyectos') ? 'active' : '' }}">Proyectos</a></li>
                    <li><a href="/aliados" class="{{ request()->is('aliados') ? 'active' : '' }}">Aliados</a></li>
                    <li><a href="/contacto" class="{{ request()->is('contacto') ? 'active' : '' }}">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h4>Nosotros</h4>
                <a href="/nosotros">Quienes Somos</a>
                <!--<a href="/nosotros#registros">Registros de gestión</a>-->
            </div>

            <div class="footer-section">
                <h4>Empresas relacionadas</h4>
                <a href="https://www.equilibrioambiental.com.pe/inicio" target="_blank" rel="noopener noreferrer">Equilibrio Ambiental</a>
                <a href="https://innovarural.org/" target="_blank" rel="noopener noreferrer">Innova Rural</a>
                <a href="https://alab.com.pe/" target="_blank" rel="noopener noreferrer">ALAB</a>
                <a href="https://www.evam-peru.com/" target="_blank" rel="noopener noreferrer">EVAM Estudios</a>
            </div>

            <div class="footer-section">
                <h4>Contacto</h4>
                <div class="contact-info">
                    <span>📍</span>
                    <p>Jr. Alonso de Molina 1652, Santiago de Surco 15023<br>Lima, Perú</p>
                </div>
                <div class="contact-info">
                    <span>✉️</span>
                    <p>info@cira.com</p>
                </div>
                <div class="contact-info">
                    <span>📞</span>
                    <p>+123 456 7890</p>
                </div>
                <div class="contact-info">
                    <span>🕐</span>
                    <p>Lunes a viernes:<br>08:30 - 17:30</p>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 CIRA. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const navMenu = document.getElementById('navMenu');

        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            menuToggle.textContent = navMenu.classList.contains('active') ? '✕' : '☰';
        });

        // Cerrar menú al hacer click en un link
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                menuToggle.textContent = '☰';
            });
        });

        // Cerrar menú al hacer click fuera
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.header-container')) {
                navMenu.classList.remove('active');
                menuToggle.textContent = '☰';
            }
        });
    </script>
</body>
</html>
