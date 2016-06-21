<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LineaPedido
 *
 * @author Daniel
 */
class LineaPedido {

    //put your code here
    private $id, $cantidad, $talla, $precio, $camiseta, $pedido;

    function __construct($id, $cantidad, $talla, $precio, $camiseta, $pedido) {
        $this->id = $id;
        $this->talla = $talla;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->camiseta = $camiseta;
        $this->pedido = $pedido;
    }

    function getId() {
        return $this->id;
    }

    function getTalla() {
        return $this->talla;
    }

    function setTalla($talla) {
        $this->talla = $talla;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getCamiseta() {
        return $this->camiseta;
    }

    function getPedido() {
        return $this->pedido;
    }
    function getCantidad() {
        return $this->cantidad;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setCamiseta($camiseta) {
        $this->camiseta = $camiseta;
    }

    function setPedido($pedido) {
        $this->pedido = $pedido;
    }

}
