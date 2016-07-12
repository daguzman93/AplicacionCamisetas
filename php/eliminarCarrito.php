<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Carrito.php';
session_start();
if (isset($_GET['pos'])) {
    $pos = $_GET['pos'];
    $carrito = unserialize($_SESSION['carrito']);
    $carrito->borrarProducto($pos);
    $_SESSION['carrito'] = serialize($carrito);
    header("Location: ../verCarrito.php");
}