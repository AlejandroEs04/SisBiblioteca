<?php

namespace Model;

class Turno extends ActiveRecord {
    protected static $tabla = 'turno';
    protected static $columnasDB = ['id', 'nombre', 'horaInicio', 'horaFin'];

    public $id;
    public $nombre;
    public $horaInicio;
    public $horaFin;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->horaInicio = $args['horaInicio'] ?? '';
        $this->horaFin = $args['horaFin'] ?? '';
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