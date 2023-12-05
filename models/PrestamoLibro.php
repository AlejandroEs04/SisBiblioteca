<?php 

namespace Model;

class PrestamoLibro extends ActiveRecord {
    protected static $tabla = 'prestamolibro';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'editorial', 'genero', 'clasificacion', 'diaslimite', 'stock', 'activo', 'prestamoID', 'fechaInicio', 'fechaFin'];

    public $id;
    public $nombre;
    public $descripcion;
    public $editorial;
    public $genero;
    public $clasificacion;
    public $diaslimite;
    public $stock;
    public $activo;
    public $prestamoID;
    public $fechaInicio;
    public $fechaFin;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->editorial = $args['editorial'] ?? '';
        $this->genero = $args['genero'] ?? '';
        $this->clasificacion = $args['clasificacion'] ?? '';
        $this->diaslimite = $args['diaslimite'] ?? '';
        $this->stock = $args['stock'] ?? '';
        $this->activo = $args['activo'] ?? '';
        $this->prestamoID = $args['prestamoID'] ?? '';
        $this->fechaInicio = $args['fechaInicio'] ?? '';
        $this->fechaFin = $args['fechaFin'] ?? '';
    }
}