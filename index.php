<?php
require 'src/config.php';
require 'src/database.php';
require 'src/helper.php';

$db = connectSqlite($dbname);

session_start();

//$dsn ="mysql:host={$DB_HOST};dbname={$DBNAME}";
//$dbMYSQL = connectMysql($dsn,$DB_USER,$DB_PASSWORD);
$controller = router($routes);

require "src/controllers/$controller". "Controller.php";