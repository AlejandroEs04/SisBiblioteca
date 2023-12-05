<?php 

namespace Model;

class MultaView extends ActiveRecord {
    protected static $tabla = 'multaView';
    protected static $columnasDB = ['id', 'nombreCliente', 'fechaFin', 'prestamoID', 'activo'];

    public $id;
    public $nombreCliente;
    public $fechaFin;
    public $prestamoID;
    public $activo;

    public function __construct($args = []) {
        $this->id = $args['id'];
        $this->nombreCliente = $args['nombreCliente'];
        $this->fechaFin = $args['fechaFin'];
        $this->prestamoID = $args['prestamoID'];
        $this->activo = $args['activo'];
    }
}