<?php

namespace Model;

class Prestamo extends ActiveRecord {
    protected static $tabla = 'prestamo';
    protected static $columnasDB = ['id', 'clienteID', 'empleadoID', 'activo', 'fechaInicio', 'fechaFin'];

    public $id;
    public $clienteID;
    public $empleadoID;
    public $activo;
    public $fechaInicio;
    public $fechaFin;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->clienteID = $args['clienteID'] ?? '';
        $this->empleadoID = $args['empleadoID'] ?? '';
        $this->activo = $args['activo'] ?? true;
        $this->fechaInicio = $args['fechaInicio'] ?? '';
        $this->fechaFin = $args['fechaFin'] ?? '';
    }
}