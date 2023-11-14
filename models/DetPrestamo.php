<?php

namespace Model;

class DetPrestamo extends ActiveRecord {
    protected static $tabla = 'detprestamo';
    protected static $columnasDB = ['prestamoID', 'libroID'];

    public $prestamoID;
    public $libroID;

    public function __construct($args = []) {
        $this->prestamoID = $args['prestamoID'] ?? null;
        $this->libroID = $args['libroID'] ?? null;
    }
}