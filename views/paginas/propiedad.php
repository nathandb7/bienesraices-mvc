<main class="contenedor seccion contenido-centrado property-detail">
    <p class="eyebrow eyebrow--dark reveal">Propiedad destacada</p>
    <h1 class="section-title reveal"><?php echo $propiedad->titulo; ?></h1>

    <div class="property-detail__grid">
        <div class="property-detail__media reveal">
            <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="<?php echo s($propiedad->titulo); ?>">
        </div>

        <aside class="resumen-propiedad property-detail__summary reveal reveal-delay-1">
            <span class="badge badge--success">Disponible</span>
            <p class="precio property-detail__price">$<?php echo $propiedad->precio; ?></p>
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
                    <img class="icono"  loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad->habitaciones; ?> Dorm.</p>
                </li>
            </ul>
            <div class="property-detail__description">
                <?php echo $propiedad->descripcion; ?>
            </div>
            <a href="/contacto" class="btn btn--primary">Consultar propiedad</a>
        </aside>
    </div>
</main>
