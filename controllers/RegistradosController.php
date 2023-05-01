<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Paquete;
use Model\Registro;
use Model\Usuario;
use MVC\Router;

class RegistradosController
{

    public static function index(Router $router)
    {

        /**
         * Autenticacion del usuario
         *
         */
        if (!is_auth() && !is_admin()) {
            header('location: /login');
        }

        $pagina_actual = $_GET['page'] ?? '';
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if (!$pagina_actual || $pagina_actual < 0) {
            header('location: /admin/registrados?page=1');
        }

        $registos_por_pagina = 10;
        $total = Registro::total();

        $paginacion = new Paginacion(
            pagina_actual: $pagina_actual,
            registro_por_pagina: $registos_por_pagina,
            total_registro: $total
        );

        if ($paginacion->total_pagina() < $pagina_actual) {
            header('location: /admin/registrados?page=1');
        }

        $registros = Registro::paginar(
            por_pagina: $registos_por_pagina,
            offset: $paginacion->offset()
        );

        foreach ($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
            $registro->paquete = Paquete::find($registro->paquete_id);
        }

        $router->render('admin/registrados/index', [
            'titulo' => 'Usuarios Registrados',
            'registros' => $registros,
            'paginacion' => $paginacion->paginacion()
        ]);
    }
}
