<?php

namespace Model;

class ClienteView extends ActiveRecord {
    protected static $tabla = 'clienteView';
    protected static $columnasDB = ['id', 'nombreCliente', 'correo', 'numero', 'calleNumero', 'colonia', 'codigoPostal', 'estado', 'municipio'];

    public $id;
    public $nombreCliente;
    public $correo;
    public $numero;
    public $calleNumero;
    public $colonia;
    public $codigoPostal;
    public $estado;
    public $municipio;

    public function __construct($args = [])
    {
        $this->id = $args['id'];
        $this->nombreCliente = $args['nombreCliente'];
        $this->correo = $args['correo'];
        $this->numero = $args['numero'];
        $this->calleNumero = $args['calleNumero'];
        $this->colonia = $args['colonia'];
        $this->codigoPostal = $args['codigoPostal'];
        $this->estado = $args['estado'];
        $this->municipio = $args['municipio'];
    }
}