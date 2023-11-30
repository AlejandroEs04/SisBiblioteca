<?php

namespace Model;

class Prestamo extends ActiveRecord {
    protected static $tabla = 'prestamo';
    protected static $columnasDB = ['id', 'clienteID', 'empleadoID', 'activo', 'fechaInicio', 'fechaFin', 'multa'];

    public $id;
    public $clienteID;
    public $empleadoID;
    public $activo;
    public $fechaInicio;
    public $fechaFin;
    public $multa;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->clienteID = $args['clienteID'] ?? '';
        $this->empleadoID = $args['empleadoID'] ?? '';
        $this->activo = $args['activo'] ?? true;
        $this->fechaInicio = $args['fechaInicio'] ?? '';
        $this->fechaFin = $args['fechaFin'] ?? '';
        $this->multa = $args['multa'] ?? '0';
    }

    public static function crearDetPrestamo($prestamoID, $libroID) {
        $query = 'CALL crearDetPrestamo( ' . $prestamoID . ', ' . $libroID . ' )';
        $resultado = self::$db->query($query);
        return $resultado;
    }
}