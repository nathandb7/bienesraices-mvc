<main class="admin-shell">
    <aside class="admin-sidebar">
        <div class="admin-brand">Bienes Raices</div>
        <?php include __DIR__ . '/../navegacion.php'; ?>
    </aside>

    <section class="admin-main">
        <header class="admin-topbar reveal">
            <div>
                <p class="admin-breadcrumb">Panel / Vendedores</p>
                <h1>Administrador de Vendedores</h1>
            </div>
            <div class="admin-actions">
                <a href="/admin" class="btn btn--light btn--sm">Inicio</a>
                <a href="/vendedores/crear" class="btn btn--primary btn--sm">Nuevo vendedor</a>
            </div>
        </header>

        <?php
            $mensaje = mostrarNotificacion( intval( $resultado) );
            if($mensaje) { ?>
                <p class="alerta exito"><?php echo s($mensaje); ?></p>
            <?php }
        ?>

        <section class="admin-section reveal reveal-delay-1">
            <div class="admin-section__header">
                <div>
                    <p class="eyebrow eyebrow--dark">Equipo comercial</p>
                    <h2>Vendedores</h2>
                </div>
            </div>

            <div class="table-card">
                <table class="propiedades data-table responsive-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach( $vendedores as $vendedor ): ?>
                        <tr>
                            <td data-label="ID"><?php echo $vendedor->id; ?></td>
                            <td data-label="Nombre"><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                            <td data-label="Telefono"><?php echo $vendedor->telefono; ?></td>
                            <td data-label="Estado"><span class="badge badge--info">Activo</span></td>
                            <td data-label="Acciones">
                                <div class="table-actions">
                                    <form method="POST" action="vendedores/eliminar" class="w-100">
                                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                                        <input type="hidden" name="tipo" value="vendedor">
                                        <input type="submit" class="boton-rojo-block btn btn--danger btn--sm" value="Eliminar">
                                    </form>

                                    <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block btn btn--light btn--sm">Actualizar</a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </section>
</main>
