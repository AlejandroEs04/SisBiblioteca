<?php 

namespace Model;

class MultaView extends ActiveRecord {
    protected static $tabla = 'multaView';
    protected static $columnasDB = ['id', 'nombreCliente', 'fechaFin'];

    public $id;
    public $nombreCliente;
    public $fechaFin;

    public function __construct($args = []) {
        $this->id = $args['id'];
        $this->nombreCliente = $args['nombreCliente'];
        $this->fechaFin = $args['fechaFin'];
    }
}