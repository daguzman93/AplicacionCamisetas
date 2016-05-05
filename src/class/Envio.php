<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Envio
 *
 * @author Daniel
 */
class Envio {
    //put your code here
    private $id, $nombre, $precio;
    function __construct($nombre, $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }



}
