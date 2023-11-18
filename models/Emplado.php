<?php 

namespace Model;

class Emplado extends ActiveRecord {
    protected static $tabla = 'empleado';
    protected static $columnasDB = ['id', 'nombre', 'password', 'rangoID', 'turnoID', 'calleNumero', 'colonia', 'codigoPostal', 'municipioID', 'estadoID', 'apellidos', 'userName'];

    public $id;
    public $nombre;
    public $password;
    public $rangoID;
    public $turnoID;
    public $calleNumero;
    public $colonia;
    public $codigoPostal;
    public $municipioID;
    public $estadoID;
    public $apellidos;
    public $userName;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->rangoID = $args['rangoID'] ?? '';
        $this->turnoID = $args['turnoID'] ?? 1;
        $this->calleNumero = $args['calleNumero'] ?? '';
        $this->colonia = $args['colonia'] ?? '';
        $this->codigoPostal = $args['codigoPostal'] ?? '';
        $this->municipioID = $args['municipioID'] ?? '';
        $this->estadoID = $args['estadoID'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->userName = $args['userName'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::setAlerta('error', 'El nombre es obligatorio');
        }
        if(!$this->apellidos) {
            self::setAlerta('error', 'Los apellidos son obligatorios');
        }
        if(!$this->password) {
            self::setAlerta('error', 'El password es obligatorio');
        }
        if(!$this->rangoID) {
            self::setAlerta('error', 'El rango es obligatorio');
        }
        if(!$this->turnoID) {
            self::setAlerta('error', 'El turno es obligatorio');
        }
        if(!$this->calleNumero || !$this->colonia || !$this->codigoPostal || !$this->municipioID || !$this->estadoID) {
            self::setAlerta('error', 'La direccion es obligatoria');
        }

        return self::$alertas;
    }

    public function validarLogin() {
        if(!$this->userName) {
            self::setAlerta('error', 'El nombre de usuario es obligatorio');
        }
        if(!$this->password) {
            self::setAlerta('error', 'El password es obligatorio');
        }

        return self::$alertas;
    }

    public function existeUsuario() {
        $query = "SELECT * FROM  " . self::$tabla . " WHERE userName = '" . $this->userName . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$alertas['error'][] = "El nombre de usuario ya existe";
        }

        return $resultado;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function comprobarPassword($password) {
        $resultado = password_verify($this->password, $password);

        if(!$resultado) {
            self::$alertas['error'][] = "Password incorrecto";
        } else {
            return true;
        }
    }
}