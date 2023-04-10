<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
use MVC\Router;

class EventosController
{
    public static function index(Router $router)
    {
        
        if (!is_auth() && !is_admin()) {
            header('location: /login');
        }

        $pagina_actual = $_GET['page'] ?? '';
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if (!$pagina_actual || $pagina_actual < 0) {
            header('location: /admin/eventos?page=1');
        }

        $registos_por_pagina = 10;
        $total = Evento::total();

        $paginacion = new Paginacion(
            pagina_actual: $pagina_actual,
            registro_por_pagina: $registos_por_pagina,
            total_registro: $total
        );

        if ($paginacion->total_pagina() < $pagina_actual) {
            header('location: /admin/ponentes?page=1');
        }


        if ($paginacion->total_pagina() < $pagina_actual) {
            header('location: /admin/ponentes?page=1');
        }

        $eventos = Evento::paginar(
            por_pagina: $registos_por_pagina,
            offset: $paginacion->offset()
        );


        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);

            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
        }




        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Talleres ',
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router)
    {
        if (!is_auth() && !is_admin()) {
            header('location: /login');
        }

        $alertas = [];

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        $evento = new Evento();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if (empty($alertas)) 
            {
                $resultado = $evento->guardar();
                if ($resultado) {
                    header('location: /admin/eventos');
                }
            }

        }

        $router->render('admin/eventos/crear', [
            'titulo' => 'Registrar Evento ',
            'alertas' => $alertas,
            'evento' => $evento,
            'categorias' => $categorias,
            'dias' =>  $dias,
            'horas' => $horas
        ]);
    }

    public static function editar(Router $router){
        if (!is_auth() && !is_admin()) {
            header('location: /login');
        }

        $alertas = [];
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/eventos');
        }

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        $evento = Evento::find($id);

        if (!$evento) {
            header('Location: /admin/eventos');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $evento->sincronizar($_POST);
            $alertas = $evento->validar();

            if (empty($alertas)) {
                // Guardar en la DB
                $resultado = $evento->guardar();

                if ($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        $router->render('admin/eventos/editar', [
            'titulo' => 'Editar Evento ',
            'alertas' => $alertas,
            'evento' => $evento,
            'categorias' => $categorias,
            'dias' =>  $dias,
            'horas' => $horas
        ]);
    }

    public static  function  eliminar(){

        if (!is_auth() && !is_admin()) {
            header('location: /login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if (!$id) {
                header('Location: /admin/eventos');
            }

            $evento = Evento::find($id);

            if (!$evento) {
                header('Location: /admin/eventos');
            }

            $evento->eliminar();

            header('Location: /admin/eventos');
        }

    }
}
