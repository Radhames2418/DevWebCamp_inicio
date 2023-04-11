<?php

/**
 * Metodo creado para poder
 * parar la ejecucion del programa y
 * observar algunas variables
 * @param $variable
 * @return string
 */
function debuguear($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function pagina_actual($path)
{
    return str_contains($_SERVER['REQUEST_URI'], $path) ? true : false ;
}

function is_auth(): bool
{
    session_start();
    return isset($_SESSION['nombre']) && !empty($_SESSION);
}

function is_admin(): bool
{
    session_start();
    return isset($_SESSION['admin']);
}