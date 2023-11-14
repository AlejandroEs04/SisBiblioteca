<?php

namespace Model;

class Estado extends ActiveRecord {
    protected static $tabla = 'estados';
    protected static $columnasDB = ['id', 'estado'];

    public $id;
    public $estado;

    public function __construct($args = []) {
        $this->id = $args['id'];
        $this->estado = $args['estado'];
    }
}