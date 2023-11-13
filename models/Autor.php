<?php 

namespace Model;

class Autor extends ActiveRecord {
    protected static $tabla = 'autor';
    protected static $columnasDB = ['id', 'nombre', 'calleNumero', 'colonia', 'codigoPostal', 'numero', 'correo', 'pais', 'estado', 'municipio'];

    public $id;
    public $nombre;
    public $calleNumero;
    public $colonia;
    public $codigoPostal;
    public $numero;
    public $correo;
    public $pais;
    public $estado;
    public $municipio;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->calleNumero = $args['calleNumero'] ?? '';
        $this->colonia = $args['colonia'] ?? '';
        $this->codigoPostal = $args['codigoPostal'] ?? '';
        $this->numero = $args['numero'] ??'';
        $this->correo = $args['correo'] ?? '';
        $this->pais = $args['pais'] ?? null;
        $this->estado = $args['estado'] ?? null;
        $this->municipio = $args['municipio'] ?? null;
    }

}