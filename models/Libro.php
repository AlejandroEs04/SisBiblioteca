<?php

namespace Model;

class Libro extends ActiveRecord {
    protected static $tabla = "libro";
    protected static $columnasDB = ['id', 'nombre', 'editorialID', 'generoID', 'clasificacionID', 'limiteID', 'stock', 'activo', 'descripcion'];

    public $id;
    public $nombre;
    public $editorialID;
    public $generoID;
    public $clasificacionID;
    public $limiteID;
    public $stock;
    public $activo;
    public $descripcion;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->editorialID = $args['editorialID'] ?? null;
        $this->generoID = $args['generoID'] ?? null;
        $this->clasificacionID = $args['clasificacionID'] ?? 1;
        $this->limiteID = $args['limiteID'] ?? null;
        $this->stock = $args['stock'] ?? null;
        $this->activo = $args['activo'] ?? true;
        $this->descripcion = $args['descripcion'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::setAlerta('error', 'El nombre es obligatorio');
        }
        if(!$this->editorialID) {
            self::setAlerta('error', 'El nombre de la editorial es obligatoria');
        }
        if(!$this->generoID) {
            self::setAlerta('error', 'El genero es obligatorio');
        }
        if(!$this->clasificacionID) {
            self::setAlerta('error', 'La clasificacion es obligatoria');
        }
        if(!$this->limiteID) {
            self::setAlerta('error', 'El limite es obligatorio');
        }
        if(!$this->stock) {
            self::setAlerta('error', 'El stock es obligatorio');
        }
        if(!$this->descripcion) {
            self::setAlerta('error', 'La descripcion es obligatoria');
        }

        return self::$alertas;
    }
}