<main class="contenedor seccion home-intro">
    <p class="eyebrow eyebrow--dark reveal">Experiencia premium</p>
    <h1 class="section-title reveal">Mas Sobre Nosotros</h1>

    <div class="iconos-nosotros feature-grid">
        <div class="icono feature-card reveal">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Operaciones acompanadas con informacion clara, seguimiento cercano y respaldo en cada etapa.</p>
        </div>
        <div class="icono feature-card reveal reveal-delay-1">
            <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
            <h3>Precio</h3>
            <p>Seleccionamos oportunidades con valor real para que tomes decisiones con confianza.</p>
        </div>
        <div class="icono feature-card reveal reveal-delay-2">
            <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
            <h3>A Tiempo</h3>
            <p>Procesos simples y comunicacion agil para avanzar sin friccion.</p>
        </div>
    </div>
</main>

<section class="seccion contenedor properties-section">
    <p class="eyebrow eyebrow--dark reveal">Seleccion destacada</p>
    <h2 class="section-title reveal">Casas y Depas en Venta</h2>

    <?php include 'listado.php'; ?>

    <div class="alinear-derecha section-actions">
        <a href="/propiedades" class="boton-verde btn btn--primary">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto editorial-band reveal">
    <div class="contenedor editorial-band__content">
        <p class="eyebrow">Asesoria personalizada</p>
        <h2>Encuentra la casa de tus suenos</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad.</p>
        <a href="/contacto" class="boton-amarillo btn btn--primary">Contactanos</a>
    </div>
</section>

<div class="contenedor seccion seccion-inferior editorial-grid">
    <section class="blog">
        <p class="eyebrow eyebrow--dark reveal">Guia inmobiliaria</p>
        <h3 class="section-title reveal">Nuestro Blog</h3>

        <article class="entrada-blog editorial-card reveal">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Terraza en el techo de una casa">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con buenos materiales y sin perder control del presupuesto.</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog editorial-card reveal reveal-delay-1">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Decoracion de hogar">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    <p>Maximiza el espacio con una guia simple para combinar muebles, colores y luz natural.</p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales reveal">
        <h3 class="section-title">Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal se comporto de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas.
            </blockquote>
            <p>- Nathan de Barros</p>
        </div>
    </section>
</div>
