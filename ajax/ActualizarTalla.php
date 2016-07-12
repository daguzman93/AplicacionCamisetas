<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Carrito.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/LineaPedido.php';
session_start();
if (isset($_GET['pos']) && isset($_GET['tal'])) {
    $pose = $_GET['pos'];
    $talla = $_GET['tal'];
    $pos = substr($pose, -1);
    $carrito = unserialize($_SESSION['carrito']);
    $carrito->getProductos()[$pos]->setTalla($talla) ;
    $_SESSION['carrito'] = serialize($carrito);
}

