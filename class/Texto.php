<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Texto
 *
 * @author Daniel
 */
class Texto {

    //put your code here
    private $id, $nombre, $ruta, $precio;

    function __construct($id, $nombre, $ruta, $precio) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ruta = $ruta;
        $this->precio = $precio;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getRuta() {
        return $this->ruta;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

}
