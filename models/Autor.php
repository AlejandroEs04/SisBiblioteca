<?php 

namespace Model;

class Autor extends ActiveRecord {
    protected static $tabla = 'autor';
    protected static $columnasDB = ['id', 'nombre', 'apellidos', 'calleNumero', 'colonia', 'codigoPostal', 'numero', 'correo', 'pais', 'estado', 'municipio'];

    public $id;
    public $nombre;
    public $apellidos;
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
        $this->apellidos = $args['apellidos'] ?? '';
        $this->calleNumero = $args['calleNumero'] ?? '';
        $this->colonia = $args['colonia'] ?? '';
        $this->codigoPostal = $args['codigoPostal'] ?? null;
        $this->numero = $args['numero'] ??'';
        $this->correo = $args['correo'] ?? '';
        $this->pais = $args['pais'] ?? null;
        $this->estado = $args['estado'] ?? null;
        $this->municipio = $args['municipio'] ?? null;
    }

    public function validar() {
        if(!$this->nombre) {
            self::setAlerta('error', 'El nombre es obligatorio');
        }
        if(!$this->apellidos) {
            self::setAlerta('error', 'El/Los apellidos son obligatorios');
        }
        
        return self::$alertas;
    }
}