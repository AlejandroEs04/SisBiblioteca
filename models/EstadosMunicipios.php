<?php

namespace Model;

class EstadosMunicipios extends ActiveRecord {
    protected static $tabla = 'estados_municipios';
    protected static $columnasDB = ['id', 'estados_id', 'municipios_id'];

    public $id;
    public $estados_id;
    public $municipios_id;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->estados_id = $args['estados_id'] ?? '';
        $this->municipios_id = $args['municipios_id'] ?? '';
    }
}