<?php

namespace Controllers;

use MVC\Router;

class DashboardController
{

    public static function index(Router $router)
    {
        if (!is_auth() && !is_admin()) {
            header('location: /login');
        }
        
        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administración'
        ]);
    }
}
