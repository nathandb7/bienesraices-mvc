<main class="contenedor seccion contact-page">
    <div class="contact-page__header reveal">
        <p class="eyebrow eyebrow--dark">Contacto</p>
        <h1 class="section-title">Hablemos de tu proxima propiedad</h1>
        <p class="section-lead">Cuentanos que buscas o que quieres vender y te contactamos con una propuesta clara.</p>
    </div>

    <?php if($mensaje) { ?>
        <p class="alerta exito"><?php echo $mensaje; ?></p>
    <?php } ?>

    <div class="contact-page__grid">
        <picture class="contact-page__media reveal">
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Interior de propiedad destacada">
        </picture>

        <form class="formulario form-card reveal reveal-delay-1" method="POST" action="/contacto">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="contacto[mensaje]"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <label for="opciones">Vende o Compra:</label>
                <select id="opciones" name="contacto[opciones]">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[presupuesto]">
            </fieldset>

            <fieldset>
                <legend>Preferencia de contacto</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto[contacto]" type="radio" value="email" id="contactar-email">
                </div>

                <div id="contacto"></div>
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde btn btn--primary">
        </form>
    </div>
</main>
