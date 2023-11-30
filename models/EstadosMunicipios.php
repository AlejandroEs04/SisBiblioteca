<?php

namespace Model;

class EstadosMunicipios extends ActiveRecord {
    protected static $tabla = 'municipioEstados';
    protected static $columnasDB = ['estadoID', 'nombre', 'municipioID'];

    public $estadoID;
    public $nombre;
    public $municipioID;

    public function __construct($args = []) {
        $this->estadoID = $args['estadoID'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->municipioID = $args['municipioID'] ?? '';
    }
}