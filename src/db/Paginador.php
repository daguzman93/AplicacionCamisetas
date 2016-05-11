<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paginador
 *
 * @author Daniel
 */
class Paginador {

    //put your code here

    private $tamanopagina, $inicio, $pagina;

    function __construct() {
        $this->tamanopagina = 5;
        $this->inicio = 0;
        $this->pagina = 1;
    }

    function getTamanopagina() {
        return $this->tamanopagina;
    }

    function getInicio() {
        return $this->inicio;
    }

    function getPagina() {
        return $this->pagina;
    }

    function setTamanopagina($tamanopagina) {
        $this->tamanopagina = $tamanopagina;
    }

    function setPagina($pagina) {
        $this->pagina = $pagina;
        $this->inicio = ($pagina - 1) * $this->tamanopagina;
    }

    function totalPaginas($totalregistros) {
        return ceil($totalregistros / $this->tamanopagina);
    }

}
