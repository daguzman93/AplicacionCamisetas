<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Carrito.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/LineaPedido.php';
session_start();
if (isset($_GET['pos']) && isset($_GET['cant'])) {
    $pose = $_GET['pos'];
    $cantidad = $_GET['cant'];
    $pos = substr($pose, -1);
    $carrito = unserialize($_SESSION['carrito']);
    $carrito->actualizarPrecioLineaporCantidad($cantidad, $pos);
    $carrito->getProductos()[$pos]->setCantidad($cantidad);
    $_SESSION['carrito'] = serialize($carrito);
    $resultado = array(
        "linea" => $pos,
        "prelinea" => $carrito->getProductos()[$pos]->getPrecio(),
        "total" => $carrito->getTotal()
    );

    print json_encode($resultado);
    exit;
}