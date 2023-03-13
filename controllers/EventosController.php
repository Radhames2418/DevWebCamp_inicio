<?php

namespace Controllers;

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
}
