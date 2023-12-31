<?php

use Controllers\AuthController;
use Controllers\PaginasController;
use Controllers\AdminController;
use MVC\Router;

require_once __DIR__ . "../../includes/app.php";

$router = new Router();

/** ZONA PUBLICA **/
/** EMPLEADOS **/
$router->get('/', [PaginasController::class, 'index']);
$router->post('/', [PaginasController::class, 'index']);

$router->get('/clientes', [PaginasController::class, 'clientes']);
$router->post('/clientes', [PaginasController::class, 'clientes']);

$router->get('/estados', [PaginasController::class, 'estados']);

$router->get('/prestamos', [PaginasController::class, 'prestamos']);
$router->post('/prestamos', [PaginasController::class, 'prestamos']);

$router->get('/multas', [PaginasController::class, 'multas']);
$router->post('/multas', [PaginasController::class, 'multas']);

/** ZONA ADMINISTRADOR **/

/** LIBREROS **/
// Autores
$router->get('/add-authors', [AdminController::class ,'addAutores']);
$router->post('/add-authors', [AdminController::class ,'addAutores']);

// Libros
$router->get('/add-books', [AdminController::class ,'addBooks']);
$router->post('/add-books', [AdminController::class ,'addBooks']);

// Generos
$router->get('/add-categories', [AdminController::class ,'addCategories']);
$router->post('/add-categories', [AdminController::class ,'addCategories']);

/** ADMINISTRADOR **/
$router->get('/admin', [AdminController::class ,'index']);
$router->post('/admin', [AdminController::class ,'index']);

$router->get('/admin/empleados', [AdminController::class ,'empleadosAdmin']);
$router->post('/admin/empleados', [AdminController::class ,'empleadosAdmin']);

$router->get('/admin/schedule', [AdminController::class ,'scheduleAdmin']);
$router->post('/admin/schedule', [AdminController::class ,'scheduleAdmin']);

$router->get('/admin/config', [AdminController::class ,'configAdmin']);
$router->post('/admin/config', [AdminController::class ,'configAdmin']);

/** LOGIN O LOGOUT **/
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);

$router->get('/logout', [AuthController::class,'logout']);

$router->comprobarRutas();