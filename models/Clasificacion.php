<?php 

namespace Model;

class Clasificacion extends ActiveRecord {
    protected static $tabla = 'clasificacion';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::setAlerta('error', 'El nombre es obligatorio');
        }

        return self::$alertas;
    }
}