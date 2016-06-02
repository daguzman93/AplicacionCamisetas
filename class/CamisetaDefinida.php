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
class CamisetaDefinida {

    private $id, $diseño, $color;

    //put your code here

    function __construct($id, $diseño, $color) {
        $this->id = $id;
        $this->diseño = $diseño;
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }

    public function getId() {
        return $this->id;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    function getDiseño() {
        return $this->diseño;
    }

    function setDiseño($diseño) {
        $this->diseño = $diseño;
    }

}
