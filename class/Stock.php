<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Stock
 *
 * @author Daniel
 */
class Stock {

    //put your code here

    private $camiseta, $color, $talla, $cantidad;

    function __construct($camiseta, $color, $talla, $cantidad) {
        $this->camiseta = $camiseta;
        $this->color = $color;
        $this->talla = $talla;
        $this->cantidad = $cantidad;
    }
    function getTalla() {
        return $this->talla;
    }

    function setTalla($talla) {
        $this->talla = $talla;
    }

        function getCamiseta() {
        return $this->camiseta;
    }

    function getColor() {
        return $this->color;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setCamiseta($camiseta) {
        $this->camiseta = $camiseta;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

}
