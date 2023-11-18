<?php

use Controllers\AuthController;
use Controllers\PaginasController;
use Controllers\AdminController;
use MVC\Router;

require_once __DIR__ . "../../includes/app.php";

$router = new Router();

/** ZONA PUBLICA **/
$router->get('/', [PaginasController::class, 'index']);
$router->post('/', [PaginasController::class, 'index']);

/** ZONA ADMINISTRADOR **/
// Autores
$router->get('/add-authors', [AdminController::class ,'addAutores']);
$router->post('/add-authors', [AdminController::class ,'addAutores']);

// Libros
$router->get('/add-books', [AdminController::class ,'addBooks']);
$router->post('/add-books', [AdminController::class ,'addBooks']);

// Generos
$router->get('/add-categories', [AdminController::class ,'addCategories']);
$router->post('/add-categories', [AdminController::class ,'addCategories']);

/** LOGIN O LOGOUT **/
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);

$router->get('/logout', [AuthController::class,'logout']);

$router->comprobarRutas();