<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author Daniel
 */
class Cliente extends Usuario{
    //put your code here
    private $nomUsuario, $pass, $rol;
    function __construct($nombre, $apellidos, $correo, $telefono, $direccion, $localidad, $provincia, $cp,$nomUsuario, $pass, $rol) {
        parent::__construct($nombre, $apellidos, $correo, $telefono, $direccion, $localidad, $provincia, $cp);
        $this->nomUsuario = $nomUsuario;
        $this->pass = $pass;
        $this->rol = $rol;
    }
    public function getApellidos() {
        return parent::getApellidos();
    }

    public function getCorreo() {
        return parent::getCorreo();
    }

    public function getCp() {
        return parent::getCp();
    }

    public function getDireccion() {
        return parent::getDireccion();
    }

    public function getId() {
        return parent::getId();
    }

    public function getLocalidad() {
        return parent::getLocalidad();
    }

    public function getNombre() {
        return parent::getNombre();
    }

    public function getProvincia() {
        return parent::getProvincia();
    }

    public function getTelefono() {
        return parent::getTelefono();
    }

    public function setApellidos($apellidos) {
        parent::setApellidos($apellidos);
    }

    public function setCorreo($correo) {
        parent::setCorreo($correo);
    }

    public function setCp($cp) {
        parent::setCp($cp);
    }

    public function setDireccion($direccion) {
        parent::setDireccion($direccion);
    }

    public function setLocalidad($localidad) {
        parent::setLocalidad($localidad);
    }

    public function setNombre($nombre) {
        parent::setNombre($nombre);
    }

    public function setProvincia($provincia) {
        parent::setProvincia($provincia);
    }

    public function setTelefono($telefono) {
        parent::setTelefono($telefono);
    }

    function getNomUsuario() {
        return $this->nomUsuario;
    }

    function getPass() {
        return $this->pass;
    }

    function getRol() {
        return $this->rol;
    }

    function setNomUsuario($nomUsuario) {
        $this->nomUsuario = $nomUsuario;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }



}
