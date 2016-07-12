<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Carrito.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/CamisetaDefinida.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Camiseta.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Diseno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/LineaPedido.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Usuario.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Envio.php';
session_start();
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$correo = $_POST['email'];
$tlfno = $_POST['tlfno'];
$direccion = $_POST['direccion'];
$localidad = $_POST['localidad'];
$provincia = $_POST['provincia'];
$cp = $_POST['cp'];
$nombreenvio = $_POST['envio'];
$pago = $_POST['tipopago'];
$gestor = new GestorBD();
$carrito = unserialize($_SESSION['carrito']);
$usuario= new Usuario("", $nombre, $apellido1. " " .$apellido2, $correo, $tlfno, $direccion, $localidad, $provincia, $cp);
$_SESSION['usuario']= serialize($usuario);
$envio= $gestor->getEnvioporNombre($nombreenvio);
$_SESSION['envio']= serialize($envio);
$lineas = $carrito->getProductos();
$precio = $gestor->getPrecioEnvioporNombre($nombreenvio);

if ($pago == 'PayPal') {
    $resultado = array(
        "nombre" => $nombre,
        "apellidos" => $apellido1. " " .$apellido2,
        "direccion" => $direccion,
        "ciudad" => $localidad,
        "tlfno" => $tlfno,
        "cp" => $cp,
        "precio" => round(($carrito->getTotal() + $precio) * 0.21 + $carrito->getTotal() + $precio, 2)
    );
    
    print json_encode($resultado);
    exit;
}
    

   