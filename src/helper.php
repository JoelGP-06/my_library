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

    if ($route === '') {
        $route = 'home';
    }
    if (!in_array($route, $routes)) {
        header('location:/404');
        exit;
    }
    return $route;
}


function view(string $view, ?array $data=null) {
    if ($data){
        extract($data,EXTR_OVERWRITE);
    }
    require VIEWS."/$view.view.php";
}