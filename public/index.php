<?php

use Controllers\AuthController;
use Controllers\PaginasController;
use MVC\Router;

require_once __DIR__ . "../../includes/app.php";

$router = new Router();

/** ZONA PUBLICA **/
$router->get('/', [PaginasController::class, 'index']);

/** ZONA ADMINISTRADOR **/
$router->get('/add-books', [PaginasController::class, 'agregarLibros']);
$router->post('/add-books', [PaginasController::class, 'agregarLibros']);


/** LOGIN O LOGOUT **/
$router->get('/login', [AuthController::class, 'login']);

$router->comprobarRutas();