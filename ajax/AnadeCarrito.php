<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Carrito.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/CamisetaDefinida.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Camiseta.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Diseno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/LineaPedido.php';
session_start();

if (isset($_SESSION['carrito'])) {
    $delantera = $_POST['delantera'];
    $trasera = $_POST['trasera'];
    $talla = $_POST['talla'];
    $diseno = new Diseno("", "", "", $delantera, $trasera, "");
    $camiseta = $_SESSION['camiseta'];
    $color = $_POST['color'];
    $camsetadef = new CamisetaDefinida($camiseta->getID(), $diseño, $color);
    $linea = new LineaPedido("", 1, $talla, $camiseta->getPrecio(), $camsetadef, "");
    $carrito = unserialize($_SESSION['carrito']);
    $carrito->agregarProducto($linea);
    $_SESSION['carrito'] = serialize($carrito);
} else {
    $delantera = $_POST['delantera'];
    $trasera = $_POST['trasera'];
    $talla = $_POST['talla'];
    $diseno = new Diseno("", "", "", $delantera, $trasera, "");
    $camiseta = $_SESSION['camiseta'];
    $color = $_POST['color'];
    $camsetadef = new CamisetaDefinida($camiseta->getID(), $diseño, $color);
    $linea = new LineaPedido("", 1, $talla, $camiseta->getPrecio(), $camsetadef, "");
    $carrito = new Carrito();
    $carrito->agregarProducto($linea);
    $_SESSION['carrito'] = serialize($carrito);
}
