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
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/LineaPedido.php';

class Carrito {

    //put your code here

    private $productos, $num_productos, $total, $envio;

    function __construct() {
        $this->productos = array();
        $this->num_productos = 0;
        $this->total=0;
        
    }

    function agregarProducto($linea) {
        array_push($this->productos, $linea);
        $this->num_productos++;
        $this->total = $this->total + $linea->getPrecio();
    }

    function borrarProducto($posicion) {
        $this->total = $this->total - $this->productos[$posicion]->getPrecio();
        array_splice($this->productos, $posicion, 1);
        $this->num_productos--;
    }

    function getProductos() {
        return $this->productos;
    }

    function getNumProductos() {
        return $this->num_productos;
    }

    function getTotal() {
        return $this->total;
    }

    function actualizarPrecioLineaporCantidad($cantidad, $posicion) {
        $this->total = $this->total - $this->productos[$posicion]->getPrecio();
        $aux = $this->productos[$posicion]->getPrecio() / $this->productos[$posicion]->getCantidad();
        $this->productos[$posicion]->setPrecio($aux * $cantidad);
        $this->total = $this->total + $this->productos[$posicion]->getPrecio();
    }
    
    

}
