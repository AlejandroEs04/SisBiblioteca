<?php 

namespace Model;

class LimLibros extends ActiveRecord {
    protected static $tabla = 'limlibros';
    protected static $columnasDB = ['id', 'diasLimite'];

    public $id;
    public $diasLimite;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->diasLimite = $args['diasLimite'] ?? null;
    }
}