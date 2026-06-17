<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)) {
        $inicio = false;
    }

    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    $isAdminView = $path === '/admin'
        || $path === '/login'
        || strpos($path, '/propiedades/crear') === 0
        || strpos($path, '/propiedades/actualizar') === 0
        || strpos($path, '/vendedores') === 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body class="<?php echo $isAdminView ? 'app-admin-view' : ''; ?>">

    <?php if(!$isAdminView): ?>
    <header class="header site-header <?php echo $inicio  ? 'inicio' : ''; ?>" data-header>
        <div class="contenedor contenido-header site-header__inner">
            <div class="barra">
                <a href="/" class="icono site-logo">
                    <img src="../build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <button class="mobile-menu menu-toggle" type="button" data-menu-toggle aria-label="Abrir menu">
                    <img src="../build/img/barras.svg" alt="">
                </button>

                <div class="derecha">
                    <button class="theme-toggle" type="button" aria-label="Cambiar modo de color">
                        <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="">
                    </button>
                    <nav class="navegacion site-nav" data-nav>
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Propiedades</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/admin">Panel</a>
                            <a href="/logout">Cerrar Sesion</a>
                        <?php endif; ?>
                    </nav>
                    <a href="/contacto" class="btn btn--primary btn--sm header-cta">Consultar</a>
                </div>
            </div>

            <?php if($inicio): ?>
                <div class="hero__content reveal">
                    <p class="eyebrow">Propiedades seleccionadas</p>
                    <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
                    <p class="hero__text">Acompanamos tu busqueda con propiedades cuidadas, asesoramiento claro y una experiencia inmobiliaria premium.</p>
                    <div class="hero__actions">
                        <a href="/propiedades" class="btn btn--primary">Ver propiedades</a>
                        <a href="/contacto" class="btn btn--light">Publicar o consultar</a>
                    </div>
                </div>
                <div class="hero__search-wrap reveal reveal-delay-1">
                    <form class="property-search" action="/propiedades" method="GET">
                        <div class="form-group">
                            <label for="buscar-ubicacion">Ubicacion</label>
                            <select id="buscar-ubicacion" name="ubicacion">
                                <option value="">Todas</option>
                                <option value="centro">Centro</option>
                                <option value="costa">Costa</option>
                                <option value="suburbios">Suburbios</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="buscar-tipo">Tipo</label>
                            <select id="buscar-tipo" name="tipo">
                                <option value="">Casa / Apartamento</option>
                                <option value="casa">Casa</option>
                                <option value="apartamento">Apartamento</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="buscar-dormitorios">Dormitorios</label>
                            <select id="buscar-dormitorios" name="dormitorios">
                                <option value="">Cualquiera</option>
                                <option value="2">2+</option>
                                <option value="3">3+</option>
                                <option value="4">4+</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="buscar-precio">Precio</label>
                            <select id="buscar-precio" name="precio">
                                <option value="">Rango</option>
                                <option value="150000">Hasta 150.000</option>
                                <option value="250000">Hasta 250.000</option>
                                <option value="500000">Hasta 500.000</option>
                            </select>
                        </div>
                        <button class="btn btn--primary" type="submit">Buscar</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </header>
    <?php endif; ?>

    <?php echo $contenido; ?>

    <?php
        if(!$isAdminView) {
            include __DIR__ . '/../includes/templates/footer.php';
        } else { ?>
            <script src="/build/js/bundle.min.js"></script>
        </body>
        </html>
        <?php
        }
    ?>
