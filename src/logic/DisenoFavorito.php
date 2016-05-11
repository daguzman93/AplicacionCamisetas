<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DisenoFavorito
 *
 * @author Daniel
 */
class DisenoFavorito {
    //put your code here
    private $diseno, $cliente;
    
    function __construct($diseno, $cliente) {
        $this->diseno = $diseno;
        $this->cliente = $cliente;
    }
    function getDiseno() {
        return $this->diseno;
    }

    function getCliente() {
        return $this->cliente;
    }

    function setDiseno($diseno) {
        $this->diseno = $diseno;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }



}
