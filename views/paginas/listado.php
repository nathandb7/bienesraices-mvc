<div class="contenedor-anuncios properties-grid">
    <?php foreach($propiedades as $propiedad): ?>
    <article class="anuncio property-card reveal">
        <a href="propiedad?id=<?php echo $propiedad->id; ?>" class="property-card__media">
            <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="<?php echo s($propiedad->titulo); ?>">
            <span class="property-card__tag">Venta</span>
        </a>

        <div class="contenido-anuncio property-card__body">
            <div class="property-card__top">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p class="precio property-card__price">$<?php echo $propiedad->precio; ?></p>
            </div>
            <p class="property-card__description"><?php echo $propiedad->descripcion; ?></p>

            <ul class="iconos-caracteristicas property-card__meta">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc; ?> Banos</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento; ?> Garages</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad->habitaciones; ?> Dorm.</p>
                </li>
            </ul>

            <a href="propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block btn btn--dark">
                Ver Propiedad
            </a>
        </div>
    </article>
    <?php endforeach; ?>
</div>
