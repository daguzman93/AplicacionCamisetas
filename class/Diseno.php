<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Diseno
 *
 * @author Daniel
 */
class Diseno {

    //put your code here
    private $id, $nombre, $categoria, $delantera, $trasera, $precio;

    function __construct($nombre, $categoria, $delantera, $trasera, $precio) {
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->delantera = $delantera;
        $this->trasera = $trasera;
        $this->precio = $precio;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getDelantera() {
        return $this->delantera;
    }

    function getTrasera() {
        return $this->trasera;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setDelantera($delantera) {
        $this->delantera = $delantera;
    }

    function setTrasera($trasera) {
        $this->trasera = $trasera;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

}
