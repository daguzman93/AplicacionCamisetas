<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Camiseta
 *
 * @author Daniel
 */
class Camiseta implements JsonSerializable {

    //put your code here
    private $id, $nombre,$genero, $delantera, $trasera, $precio;

    public function __construct($id,$nombre,$genero, $delantera, $trasera, $precio) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->genero = $genero;
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
    function getGenero() {
        return $this->genero;
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
    function setGenero($genero) {
        $this->genero = $genero;
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

    public function jsonSerialize() {
         return (object) get_object_vars($this);
    }

}
