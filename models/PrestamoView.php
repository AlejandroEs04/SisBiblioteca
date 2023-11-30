<?php

namespace Model;

class PrestamoView extends ActiveRecord {
    protected static $tabla = 'prestamoView';
    protected static $columnasDB = ['id', 'nombreCliente', 'nombreEmpleado', 'activo', 'fechaInicio', 'fechaFin', 'multa'];

    public $id;
    public $nombreCliente;
    public $nombreEmpleado;
    public $activo;
    public $fechaInicio;
    public $fechaFin;
    public $multa;

    public function __construct($args = [])
    {
        $this->id = $args['id'];
        $this->nombreCliente = $args['nombreCliente'];
        $this->nombreEmpleado = $args['nombreEmpleado'];
        $this->activo = $args['activo'];
        $this->fechaInicio = $args['fechaInicio'];
        $this->fechaFin = $args['fechaFin'];
        $this->multa = $args['multa'];
    }
}