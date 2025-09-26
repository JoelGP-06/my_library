<?php
    //carga de datos
    require 'src/models/books.php';
    //carga de helper.php
    require 'src/helper.php';
    $controller = router($routes);

    //carga de vista
    require 'src/views/home.view.php';