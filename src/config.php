<?php
define("VIEWS", __DIR__. '/views');

$routes = [
    'home',
    'books',
    'login',
    'auth',
    'logout',
    'register',
    'signup',
    'add-book',
    'insert-book',
    'edit-book',
    'eliminate',
    'update-book',
    'delete-book', 
    '404',
    'user',
    'insert-comment',
    'full-book'
];

$dbname = "db.sqlite";

define("DBNAME", "db");
define("USERDB", "root");
define("PASSDB", "");
define("DBHOST", "localhost");
define("DBCHARSET", "utf8mb4");

define("DSN", "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=" . DBCHARSET);
//las constantes tmn se pueden crear asi:

$DB_HOST = "127.0.0.1";
$DB_NAME = "db.sqlite";
$DB_USER = "user";
$DB_PASSWORD = "****";
