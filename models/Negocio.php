<?php

namespace Model;

class Negocio extends ActiveRecord {
    protected static $tabla = 'negocio';
    protected static $columnasDB = ['id', 'nombre', 'correo', 'numero', 'vision', 'mision', 'logo', 'calleNumero', 'colonia', 'codigoPostal', 'municipioID'];

    public $id;
    public $nombre;
    public $correo;
    public $numero;
    public $vision;
    public $mision;
    public $logo;
    public $calleNumero;
    public $colonia;
    public $codigoPostal;
    public $municipioID;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->numero = $args['numero'] ?? '';
        $this->vision = $args['vision'] ?? '';
        $this->mision = $args['mision'] ?? '';
        $this->logo = $args['logo'] ?? '';
        $this->calleNumero = $args['calleNumero'] ?? '';
        $this->colonia = $args['colonia'] ?? '';
        $this->codigoPostal = $args['codigoPostal'] ?? '';
        $this->municipioID = $args['municipioID'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::setAlerta('error', 'El nombre es obligatorio');
        }
        if(!$this->correo) {
            self::setAlerta('error', 'El correo es obligatorio');
        }
        if(!$this->numero) {
            self::setAlerta('error', 'El numero es obligatorio');
        }
        if(!$this->vision) {
            self::setAlerta('error', 'La vision es obligatoria');
        }
        if(!$this->mision) {
            self::setAlerta('error', 'La mision es obligatoria');
        }
        if(!$this->logo) {
            self::setAlerta('error', 'El logo es obligatorio');
        }
        if(!$this->calleNumero || !$this->colonia || !$this->codigoPostal || !$this->municipioID) {
            self::setAlerta('error', 'La direccion es obligatoria');
        }
        return self::$alertas;
    }
}