<?php

function dd()
{
    $args = func_get_args();
    foreach ($args as $arg) {
        echo '<pre>';
        var_dump($arg);
        echo '</pre>';
        die();
    }
}


function router(array $routes): string
{
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $parsedUrl = parse_url($uri);
    $path = $parsedUrl['path'] ?? '/';
    $route = trim($path, '/');

    // Ruta por defecto si no detecta el localhost base como página incorrecta ya que no está en el array
    if ($route === '') {
        $route = 'home';
    }
    if (!in_array($route, $routes)) {
        echo "<h1>Error 404: Page not found</h1>";
        exit;
    }
    return $route;
}


function view() {}
