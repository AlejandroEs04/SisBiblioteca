<?php

namespace Model;

class EmpleadoView extends ActiveRecord {
    protected static $tabla = 'empleadoView';
    protected static $columnasDB = ['id', 'nombre', 'calleNumero', 'colonia', 'codigoPostal', 'estado', 'municipio', 'rango', 'turno', 'activo'];

    public $id;
    public $nombre;
    public $calleNumero;
    public $colonia;
    public $codigoPostal;
    public $estado;
    public $municipio;
    public $rango;
    public $turno;
    public $activo;

    public function __construct($args = [])
    {
        $this->id = $args['id'];
        $this->nombre = $args['nombre'];
        $this->calleNumero = $args['calleNumero'];
        $this->colonia = $args['colonia'];
        $this->codigoPostal = $args['codigoPostal'];
        $this->estado = $args['estado'];
        $this->municipio = $args['municipio'];
        $this->rango = $args['rango'];
        $this->turno = $args['turno'];
        $this->activo = $args['activo'];
    }
}