<?php

namespace Model;

class Libro extends ActiveRecord {
    protected static $_tabla = "libro";
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
        $this->nombre = $args['nombre'] ?? null;
        $this->editorialID = $args['editorialID'] ?? null;
        $this->generoID = $args['generoID'] ?? null;
        $this->clasificacionID = $args['clasificacionID'] ?? null;
        $this->limiteID = $args['limiteID'] ?? null;
        $this->stock = $args['stock'] ?? null;
        $this->activo = $args['activo'] ?? null;
        $this->descripcion = $args['descripcion'] ?? null;
    }

    public function validar() {
        
    }
}