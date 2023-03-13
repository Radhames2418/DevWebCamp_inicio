<?php

namespace Controllers;

use MVC\Router;

class RegistradosController
{

    public static function index(Router $router)
    {
        if (!is_auth() && !is_admin()) {
            header('location: /login');
        }
        
        $router->render('admin/registrados/index', [
            'titulo' => 'Usuarios Registrados'
        ]);
    }
}
