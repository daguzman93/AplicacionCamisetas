<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carrito
 *
 * @author Daniel
 */

class Carrito {

    //put your code here

    private $productos, $num_productos;

    function __construct() {
        $this->productos = array();
        $this->num_productos = 0;
    }

    function agregarProducto($linea) {
        array_push($this->productos, $linea);
        $this->num_productos++;
    }

    function borrarProducto($posicion) {
        $this->productos[$posicion] = 0;
        $this->num_productos--;
    }

    function getProductos() {
        return $this->productos;
    }

    function getNumProductos() {
        return $this->num_productos;
    }

  

}
