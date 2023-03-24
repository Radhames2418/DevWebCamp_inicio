<?php

namespace Controllers;

use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use MVC\Router;

class EventosController
{
    public static function index(Router $router)
    {
        
        if (!is_auth() && !is_admin()) {
            header('location: /login');
        }

        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Talleres '
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
}
