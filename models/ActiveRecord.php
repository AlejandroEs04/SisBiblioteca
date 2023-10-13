<?php

namespace Model;

class ActiveRecord {
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    /** ALERTAS Y MENSAJES */
    protected static $alertas = [];

    /** DEFINIR LA CONEXION A LA BASE DE DATOS */
    public static function setDB($database) {
        self::$db = $database;
    }

    /** DEFINIR LA FUNCION PARA LAS ALERTAS */
    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }

    /** OBTENER LAS ALERTAS */
    public static function getAlertas() {
        return static::$alertas;
    }

    public function validar() {
        static::$alertas = [];
        return static::$alertas;
    }

    /** CONSULTA SQL PARA CREAR UN OBJETO EN MEMORIA */
    public static function consultarSQL($query) {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados 
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // Liberar la memoria
        $resultado->free();

        return $array;
    }

    /** CREAR EL OBJETO EN MEMORIA */
    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach($registro as $key => $value) {
            if(property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Identificar y unir los atributos de la DB
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizar los datos antes de guardarlos en la DB
    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Sincroniza DB con Objetos en la memoria
    public function sincronizar($args=[]) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    /** FUNCIONES DEL CRUD */
    // Verificar si el item se va a registrar o editar
    public function guardar() {
        $resultado = '';
        if(!is_null($this->id)) {
            // El objeto tiene id y se actualizara
            $resultado = $this->actualizar();
        } else {
            // El objeto no tiene id y se creara
            $resultado = $this->crear();
        }
        return $resultado;
    }

    // Obtener todos los registros
    public function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Obtener un registro especifico por su id
    public function find($id) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // Obtener un numero limitado de registros
    public function get($limit) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT ${limit}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // Obtener registros en especifico 
    public function where($columna, $valor) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE ${columna} = '${valor}'";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // Crear el registro
    public function crear() {
        // Sanitizar los datos 
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos 
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= " ')";

        // Resultado de la consulta 
        $resultado = self::$db->query($query);
        return [
            'resultado' => $resultado,
            'id' => self::$db->insert_id
        ];
    }

    // Actualizar el registro
    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Iterar para ir agregando cada campo de la DB
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        // Consultar SQL 
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1";

        // Actualizar DB
        $resultado = self::$db->query($query);
        return $resultado;
    }

    // Eliminar un Registro por su ID
    public function eliminar() {
        $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }
}