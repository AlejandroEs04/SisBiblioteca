<?php 

namespace Model;

class InfoLibro extends ActiveRecord {
    protected static $tabla = 'infolibro';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'editorial', 'genero', 'clasificacion', 'diaslimite', 'stock', 'activo'];

    public $id;
    public $nombre;
    public $descripcion;
    public $editorial;
    public $genero;
    public $clasificacion;
    public $diaslimite;
    public $stock;
    public $activo;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->editorial = $args['editorial'] ?? '';
        $this->genero = $args['genero'] ?? '';
        $this->clasificacion = $args['clasificacion'] ?? '';
        $this->diaslimite = $args['diaslimite'] ?? '';
        $this->stock = $args['stock'] ?? '';
        $this->activo = $args['activo'] ?? true;
    }
}