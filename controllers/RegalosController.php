<?php

namespace Controllers;

use MVC\Router;

class RegalosController
{

    public static function index(Router $router)
    {
        if (!is_auth() && !is_admin()) {
            header('location: /login');
        }
        
        
        $router->render('admin/regalos/index', [
            'titulo' => 'Regalos'
        ]);
    }
}
