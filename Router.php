<?php

namespace MVC;

class Router {
    // Iniciamos el arreglo de las rutas GET y POST
    public $rutasGet = [];
    public $rutasPost = [];

    // iniciamos las funciones de GET y POST para darles la url y la funcion
    public function get($url, $fn) {
        $this->rutasGet[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->rutasPost[$url] = $fn;
    }

    /** COMPROBACION DE LAS RUTAS **/
    public function comprobarRutas() {
        session_start();

        // Comprobar si el usuario inicia sesion para entrar a las opciones de admin
        /** Verificar si utilizare admin **/
        $auth = $_SESSION['login'] ?? null;

        /** Agregar las rutas protegidas **/
        $rutas_protegidas = [

        ];

        /** Identificar en que ruta se encuentra el usuario **/
        // Para localHost: Para habilitar, elimine #
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';

        // Para Host: Para habilitar, elimine #
        #$urlActual = $_SERVER['REQUEST_URI'] ?? '/';

        /** Identificar el metodo POST y GET **/
        $metodo = $_SERVER['REQUEST_METHOD'];

        /** Idenfiticar los metodos **/
        if($metodo === 'GET') {
            $fn = $this->rutasGet[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPost[$urlActual] ?? null;
        }

        /** Proteger las rutas **/
        // Identificamos la ruta en la que se esta, y si esta protegida y no estamos autenticados, se enviara al menu principal, si estamos identificados, deja accesar
        if(in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /');
        }

        // Verificar que la ruta exista o no 
        if($fn) {
            call_user_func($fn, $this);
        } else {
            echo "Pagina no encontrada";
        }
    }

    /** MOSTRAR O RENDERIZAR LA VISTA **/
    public function render( $view, $datos = [] ) {

        foreach($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
}