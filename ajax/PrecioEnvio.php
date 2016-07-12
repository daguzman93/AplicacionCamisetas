<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Carrito.php';
session_start();
if(isset($_GET['env']) && isset($_SESSION['carrito'])){
    $carrito= unserialize($_SESSION['carrito']);
    $gdb= new GestorBD();
    $envio = $_GET['env'];
    $precio = $gdb->getPrecioEnvioporNombre($envio);
    echo json_encode(array(
        'envio'=> $precio,
        'iva'=> round(($carrito->getTotal()+$precio)*0.21,2),
        'total'=> round(($carrito->getTotal()+$precio)*0.21 + $carrito->getTotal()+$precio,2)
    ));
    exit;
}