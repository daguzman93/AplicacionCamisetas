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
    
    function __construct($id,$nombre, $stock, $talla, $color, $genero, $delantera, $trasera, $precio,$diseño) {
        parent::__construct($id,$nombre, $stock, $talla, $color, $genero, $delantera, $trasera, $precio);
        $this->diseño = $diseño;
    }
    public function getColor() {
        return parent::getColor();
    }

    public function getDelantera() {
        return parent::getDelantera();
    }

    public function getGenero() {
        return parent::getGenero();
    }

    public function getId() {
        return parent::getId();
    }

    public function getNombre() {
        return parent::getNombre();
    }

    public function getPrecio() {
        return parent::getPrecio();
    }

    public function getStock() {
        return parent::getStock();
    }

    public function getTalla() {
        return parent::getTalla();
    }

    public function getTrasera() {
        return parent::getTrasera();
    }

    public function setColor($color) {
        parent::setColor($color);
    }

    public function setDelantera($delantera) {
        parent::setDelantera($delantera);
    }

    public function setGenero($genero) {
        parent::setGenero($genero);
    }

    public function setId($id) {
        parent::setId($id);
    }

    public function setNombre($nombre) {
        parent::setNombre($nombre);
    }

    public function setPrecio($precio) {
        parent::setPrecio($precio);
    }

    public function setStock($stock) {
        parent::setStock($stock);
    }

    public function setTalla($talla) {
        parent::setTalla($talla);
    }

    public function setTrasera($trasera) {
        parent::setTrasera($trasera);
    }

    function getDiseño() {
        return $this->diseño;
    }

    function setDiseño($diseño) {
        $this->diseño = $diseño;
    }

}
