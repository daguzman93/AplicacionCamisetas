<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CamisetaDefinida
 *
 * @author Daniel
 */
class CamisetaDefinida extends Camiseta{
    
    private $diseño;
    //put your code here
    
    function __construct($nombre, $stock, $talla, $color, $genero, $delantera, $trasera, $precio,$diseño) {
        parent::__construct($nombre, $stock, $talla, $color, $genero, $delantera, $trasera, $precio);
        $this->diseño = $diseño;
    }
    function getDiseño() {
        return $this->diseño;
    }

    function setDiseño($diseño) {
        $this->diseño = $diseño;
    }



}
