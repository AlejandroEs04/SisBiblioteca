<?php

namespace Model;

class Turno extends ActiveRecord {
    protected static $tabla = 'turno';
    protected static $columnasDB = ['id', 'nombre', 'fechaInicio', 'fechaFin'];

    public $id;
    public $nombre;
    public $fechaInicio;
    public $fechaFin;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->fechaInicio = $args['fechaInicio'] ?? '';
        $this->fechaFin = $args['fechaFin'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::setAlerta('error', 'El nombre es obligatorio');
        }
        if(!$this->fechaInicio || !$this->fechaFin) {
            self::setAlerta('error', 'El horario es obligatoria');
        }
    }
}