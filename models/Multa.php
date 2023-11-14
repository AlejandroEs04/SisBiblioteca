<?php 

namespace Model;

class Multa extends ActiveRecord {
    protected static $tabla = 'multa';
    protected static $columnasDB = ['id', 'prestamoID', 'clienteID'];

    public $id;
    public $prestamoID;
    public $clienteID;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->prestamoID = $args['prestamoID'] ?? '';
        $this->clienteID = $args['clienteID'] ?? '';
    }
}