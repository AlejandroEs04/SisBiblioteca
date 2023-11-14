<?php 

namespace Model;

class LimLibros extends ActiveRecord {
    protected static $tabla = 'limlibros';
    protected static $columnasDB = ['id', 'diaslimite'];

    public $id;
    public $diaslimite;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->diaslimite = $args['diaslimite'] ?? null;
    }
}