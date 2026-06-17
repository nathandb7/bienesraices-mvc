<main class="admin-shell">
    <aside class="admin-sidebar">
        <div class="admin-brand">Bienes Raices</div>
        <?php include __DIR__ . '/../navegacion.php'; ?>
    </aside>

    <section class="admin-main">
        <header class="admin-topbar reveal">
            <div>
                <p class="admin-breadcrumb">Panel / Dashboard</p>
                <h1>Administrador de Bienes Raices</h1>
            </div>
            <div class="admin-actions">
                <input class="admin-search" type="search" placeholder="Buscar propiedad..." data-admin-search>
                <a href="propiedades/crear" class="btn btn--primary btn--sm">Nueva propiedad</a>
            </div>
        </header>

        <?php
            $totalPropiedades = count($propiedades);
            $totalVendedores = count($vendedores);
            $valorInventario = array_reduce($propiedades, function($total, $propiedad) {
                return $total + (float) $propiedad->precio;
            }, 0);
            $mensaje = mostrarNotificacion( intval( $resultado) );
            if($mensaje) { ?>
                <p class="alerta exito"><?php echo s($mensaje); ?></p>
            <?php }
        ?>

        <section class="kpi-grid reveal reveal-delay-1">
            <article class="kpi-card kpi-card--primary">
                <span>Propiedades activas</span>
                <strong><?php echo $totalPropiedades; ?></strong>
                <small>Publicadas en el sistema</small>
            </article>
            <article class="kpi-card kpi-card--dark">
                <span>Vendedores</span>
                <strong><?php echo $totalVendedores; ?></strong>
                <small>Equipo disponible</small>
            </article>
            <article class="kpi-card">
                <span>Valor inventario</span>
                <strong>$<?php echo number_format($valorInventario, 0, ',', '.'); ?></strong>
                <small>Precio publicado total</small>
            </article>
            <article class="kpi-card">
                <span>Acciones rapidas</span>
                <strong>2</strong>
                <small>Propiedades y vendedores</small>
            </article>
        </section>

        <section class="admin-section reveal">
            <div class="admin-section__header">
                <div>
                    <p class="eyebrow eyebrow--dark">Gestion</p>
                    <h2>Propiedades</h2>
                </div>
                <a href="propiedades/crear" class="btn btn--light btn--sm">Agregar</a>
            </div>

            <div class="table-card">
                <table class="propiedades data-table responsive-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Imagen</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach( $propiedades as $propiedad ): ?>
                        <tr>
                            <td data-label="ID"><?php echo $propiedad->id; ?></td>
                            <td data-label="Titulo"><?php echo $propiedad->titulo; ?></td>
                            <td data-label="Imagen"><img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla" alt="<?php echo s($propiedad->titulo); ?>"></td>
                            <td data-label="Precio">$ <?php echo $propiedad->precio; ?></td>
                            <td data-label="Estado"><span class="badge badge--success">Activa</span></td>
                            <td data-label="Acciones">
                                <div class="table-actions">
                                    <form method="POST" action="propiedades/eliminar" class="w-100">
                                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                                        <input type="hidden" name="tipo" value="propiedad">
                                        <input type="submit" class="boton-rojo-block btn btn--danger btn--sm" value="Eliminar">
                                    </form>

                                    <a href="propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block btn btn--light btn--sm">Actualizar</a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="admin-section reveal">
            <div class="admin-section__header">
                <div>
                    <p class="eyebrow eyebrow--dark">Equipo comercial</p>
                    <h2>Vendedores</h2>
                </div>
                <a href="vendedores/crear" class="btn btn--light btn--sm">Agregar</a>
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
