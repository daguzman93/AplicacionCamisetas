<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pedido
 *
 * @author Daniel
 */
class Pedido {
    //put your code here
    private $id, $fecha, $precio, $direccion, $pago, $estado, $envio, $usuario;
    function __construct($fecha, $precio, $direccion, $pago, $estado, $envio, $usuario) {
        $this->fecha = $fecha;
        $this->precio = $precio;
        $this->direccion = $direccion;
        $this->pago = $pago;
        $this->estado = $estado;
        $this->envio = $envio;
        $this->usuario = $usuario;
    }
    function getId() {
        return $this->id;
    }

        function getFecha() {
        return $this->fecha;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getPago() {
        return $this->pago;
    }

    function getEstado() {
        return $this->estado;
    }

    function getEnvio() {
        return $this->envio;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setPago($pago) {
        $this->pago = $pago;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setEnvio($envio) {
        $this->envio = $envio;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }



}
