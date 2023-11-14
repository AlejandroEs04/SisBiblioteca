<?php

namespace Model;

class Editorial extends ActiveRecord {
    protected static $tabla = 'editorial';
    protected static $columnasDB = ['id', 'nombre', 'calleNumero', 'colonia', 'codigoPostal', 'numero', 'correo', 'municipio', 'estado', 'pais'];

    public $id;
    public $nombre;
    public $calleNumero;
    public $colonia;
    public $codigoPostal;
    public $numero;
    public $correo;
    public $municipio;
    public $estado;
    public $pais;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->calleNumero = $args['calleNumero'] ?? '';
        $this->colonia = $args['colonia'] ?? '';
        $this->codigoPostal = $args['codigoPostal'] ?? '';
        $this->numero = $args['numero'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->municipio = $args['municipio'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->pais = $args['pais'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::setAlerta('error', 'El nombre es obligatorio');
        }
        
        return self::$alertas;
    }
}