<?php 

namespace Model;

class MultaView extends ActiveRecord {
    protected static $tabla = 'multaview';
    protected static $columnasDB = ['id', 'nombre', 'prestamoID'];

    public $id;
    public $nombre;
    public $prestamoID;

    public function __construct($args = []) {
        $this->id = $args['id'];
        $this->nombre = $args['nombre'];
        $this->prestamoID = $args['prestamoID'];
    }
}