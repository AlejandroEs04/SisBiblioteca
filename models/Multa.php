<?php 

namespace Model;

class Multa extends ActiveRecord {
    protected static $tabla = 'multa';
    protected static $columnasDB = ['id', 'prestamoID', 'clienteID', 'activo', 'costo'];

    public $id;
    public $prestamoID;
    public $clienteID;
    public $activo;
    public $costo;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->prestamoID = $args['prestamoID'] ?? '';
        $this->clienteID = $args['clienteID'] ?? '';
        $this->activo = $args['activo'] ?? '';
        $this->costo = $args['costo'] ?? '';
    }
}