<?php 

namespace Model;

class Cliente extends ActiveRecord {
    protected static $tabla = 'cliente';
    protected static $columnasDB = ['id', 'nombre', 'correo', 'numero', 'calleNumero', 'colonia', 'codigoPostal', 'municipioID'];

    public $id;
    public $nombre;
    public $correo;
    public $numero;
    public $calleNumero;
    public $colonia;
    public $codigoPostal;
    public $minicipioID;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->numero = $args['numero'] ?? '';
        $this->calleNumero = $args['calleNumero'] ?? '';
        $this->colonia = $args['colonia'] ?? '';
        $this->codigoPostal = $args['codigoPostal'] ?? '';
        $this->minicipioID = $args['minicipioID'] ?? '';
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
        if(!$this->calleNumero) {
            self::setAlerta('error', 'La direccion es obligatoria');
        }
        if(!$this->colonia) {
            self::setAlerta('error', 'La direccion es obligatoria');
        }
        if(!$this->codigoPostal) {
            self::setAlerta('error', 'La direccion es obligatoria');
        }
        if(!$this->minicipioID) {
            self::setAlerta('error', 'La direccion es obligatoria');
        }

        return self::$alertas;
    }
}