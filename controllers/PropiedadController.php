<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController  {

    private static function generarNombreImagen(array $archivo): string {
        $extension = pathinfo($archivo['name'] ?? '', PATHINFO_EXTENSION);
        $extension = strtolower($extension ?: 'jpg');
        $extensionesPermitidas = ['jpg', 'jpeg', 'png'];

        if(!in_array($extension, $extensionesPermitidas)) {
            $extension = 'jpg';
        }

        return md5( uniqid( rand(), true ) ) . "." . $extension;
    }

    private static function guardarImagenSubida(array $archivo, string $nombreImagen): void {
        if(!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES, 0755, true);
        }

        $tmpName = $archivo['tmp_name'] ?? '';
        if(!$tmpName) {
            return;
        }

        $destino = CARPETA_IMAGENES . $nombreImagen;

        if(extension_loaded('gd')) {
            Image::make($tmpName)->fit(800,600)->save($destino);
            return;
        }

        move_uploaded_file($tmpName, $destino);
    }

    public static function index(Router $router) {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/index', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router) {

        $errores = Propiedad::getErrores();
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $propiedad = new Propiedad($_POST['propiedad']);

            $archivoImagen = $_FILES['propiedad'] ?? [];
            $imagenSubida = $archivoImagen['tmp_name']['imagen'] ?? '';
            $nombreImagen = self::generarNombreImagen([
                'name' => $archivoImagen['name']['imagen'] ?? ''
            ]);

            if($imagenSubida) {
                $propiedad->setImagen($nombreImagen);
            }

            $errores = $propiedad->validar();

            if(empty($errores)) {
                if($imagenSubida) {
                    self::guardarImagenSubida([
                        'tmp_name' => $imagenSubida,
                        'name' => $archivoImagen['name']['imagen'] ?? ''
                    ], $nombreImagen);
                }

                $resultado = $propiedad->guardar();

                if($resultado) {
                    header('location: /propiedades');
                }
            }
        }

        $router->render('propiedades/crear', [
            'errores' => $errores,
            'propiedad' => $propiedad,
            'vendedores' => $vendedores
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['propiedad'];
            $propiedad->sincronizar($args);

            $archivoImagen = $_FILES['propiedad'] ?? [];
            $imagenSubida = $archivoImagen['tmp_name']['imagen'] ?? '';
            $nombreImagen = self::generarNombreImagen([
                'name' => $archivoImagen['name']['imagen'] ?? ''
            ]);

            if($imagenSubida) {
                $propiedad->setImagen($nombreImagen);
            }

            $errores = $propiedad->validar();

            if(empty($errores)) {
                if($imagenSubida) {
                    self::guardarImagenSubida([
                        'tmp_name' => $imagenSubida,
                        'name' => $archivoImagen['name']['imagen'] ?? ''
                    ], $nombreImagen);
                }

                $resultado = $propiedad->guardar();

                if($resultado) {
                    header('location: /propiedades');
                }
            }
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function eliminar(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = $_POST['tipo'];

            if(validarTipoContenido($tipo) ) {
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);

                $propiedad = Propiedad::find($id);
                $resultado = $propiedad->eliminar();

                if($resultado) {
                    header('location: /propiedades');
                }
            }
        }
    }
}
