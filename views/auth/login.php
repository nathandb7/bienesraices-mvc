<main class="auth-page">
    <section class="auth-card reveal">
        <p class="eyebrow eyebrow--dark">Panel privado</p>
        <h1>Iniciar Sesion</h1>
        <p>Accede al dashboard para gestionar propiedades y vendedores.</p>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario" novalidate>
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu Email" id="email">

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="password">
            </fieldset>

            <input type="submit" value="Iniciar Sesion" class="boton boton-verde btn btn--primary">
        </form>
    </section>
</main>
