<?php

use Controllers\PaginasController;
use MVC\Router;

require_once __DIR__ . "../../includes/app.php";

$router = new Router();

/** ZONA PUBLICA **/
$router->get('/', [PaginasController::class, 'index']);

/** ZONA PRIVADA **/

/** LOGIN O LOGOUT **/

$router->comprobarRutas();