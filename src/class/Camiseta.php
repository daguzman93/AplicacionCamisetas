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

class Camiseta {

    //put your code here
    private $id, $nombre, $stock, $talla, $color, $genero, $delantera, $trasera, $precio;

    public function __construct( $nombre, $stock, $talla, $color, $genero, $delantera, $trasera, $precio ) {
        $this->nombre=$nombre;
        $this->stock=$stock;
        $this->talla=$talla;
        $this->color=$color;
        $this->genero=$genero;
        $this->delantera=$delantera;
        $this->trasera=$trasera;
        $this->precio=$precio;
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getStock() {
        return $this->stock;
    }

    function getTalla() {
        return $this->talla;
    }

    function getColor() {
        return $this->color;
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

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setTalla($talla) {
        $this->talla = $talla;
    }

    function setColor($color) {
        $this->color = $color;
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



}
