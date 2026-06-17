<main class="admin-shell">
    <aside class="admin-sidebar">
        <div class="admin-brand">Bienes Raices</div>
        <?php include __DIR__ . '/../navegacion.php'; ?>
    </aside>

    <section class="admin-main admin-form-page">
    <div class="admin-form-page__header reveal">
        <div>
            <p class="admin-breadcrumb">Panel / Vendedores</p>
            <h1>Actualizar Vendedor: <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?></h1>
        </div>
        <a href="/admin" class="boton boton-verde btn btn--light">Volver</a>
    </div>

    <?php foreach($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form class="formulario form-card reveal reveal-delay-1" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <div class="form-actions">
            <input type="submit" value="Actualizar Vendedor" class="boton boton-verde btn btn--primary">
        </div>
    </form>
    </section>
</main>
