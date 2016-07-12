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
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Diseno.php';
session_start();
if (isset($_SESSION["carrito"])) {
    $gdb = new GestorBD();
    $carrito = unserialize($_SESSION['carrito']);
    $lineas = $carrito->getProductos();
    $usuario = unserialize($_SESSION['usuario']);
    $envio = unserialize($_SESSION['envio']);

    $idusu = $gdb->insertarUsuario($usuario->getNombre(), $usuario->getApellidos(), $usuario->getCorreo(), $usuario->getTelefono(), $usuario->getDireccion(), $usuario->getLocalidad(), $usuario->getProvincia(), $usuario->getCp());
    $idpedido = $gdb->insertarPedido(date("Y-m-d H:i:s"), round(($carrito->getTotal() + $envio->getPrecio()) * 0.21 + $carrito->getTotal() + $envio->getPrecio(), 2), $usuario->getDireccion(), "PayPal", "pendiente", $envio->getID(), $idusu);
    for ($i = 0; $i < $carrito->getNumProductos(); $i++) {
        if (strcmp($lineas[$i]->getCamiseta()->getDiseno()->getCategoria(), "Personalizados") == 0) {
            $iddiseno = $gdb->insertarDiseno($lineas[$i]->getCamiseta()->getDiseno()->getNombre(), $lineas[$i]->getCamiseta()->getDiseno()->getCategoria(), $lineas[$i]->getCamiseta()->getDiseno()->getDelantera(), $lineas[$i]->getCamiseta()->getDiseno()->getTrasera(), $lineas[$i]->getCamiseta()->getDiseno()->getPrecio());
            $gdb->insertarCamisetaDefinida($lineas[$i]->getCamiseta()->getId(), $iddiseno, $lineas[$i]->getCamiseta()->getColor());
        }
        $gdb->insertarLineaPedido($lineas[$i]->getCantidad(), $lineas[$i]->getTalla(), $lineas[$i]->getPrecio(), $lineas[$i]->getCamiseta()->getId(), $iddiseno, $idpedido);
    }
    $headers = "From: danielagustinas@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; Content-Disposition: inline; charset=utf-8\r\n";
    $titulo = 'Resumen de su pedido en Mas de mil ';
    $mensaje = '<html> <head> <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link type = "text/css" rel = "stylesheet" href = "/localhost/AplicacionCamisetas/css/estilo.css"/>
        <link type = "text/css" rel = "stylesheet" href = "/localhost/AplicacionCamisetas/css/carrito.css"/> </head><body>  <table>
                            <thead>
                                <tr>
                                    <th colspan="2">Producto</th>
                                    <th>Talla</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>';

    for ($i = 0; $i < $carrito->getNumProductos(); $i++) {
        $modelocamiseta = $gdb->getCamisetaporId($lineas[$i]->getCamiseta()->getId());

        $mensaje.='<tr><td><img class="camiseta-miniatura"  src="http://localhost/AplicacionCamisetas/img/fotosMasdeMil/' . $modelocamiseta->getDelantera() .'" style="background-color:' . $lineas[$i]->getCamiseta()->getColor() . '"></td>';

        $mensaje.='<td>' . $modelocamiseta->getNombre() . '</td>';
        $mensaje.='<td>' . $lineas[$i]->getTalla() . '</td>';
        $mensaje.='<td>' . $lineas[$i]->getCantidad() . '</td>';
        $mensaje.='<td id="preciolinea' . $i . '">' . $lineas[$i]->getPrecio() . ' €</td></tr>';
    }
    $total = round((($carrito->getTotal() + $envio->getPrecio()) * 0.21) + $carrito->getTotal() + $envio->getPrecio(), 2);
    $mensaje.=' <tr><td colspan = "4" style = "text-align: right"> Subtotal: </td>';
    $mensaje.='<td >' . $carrito->getTotal() . ' €</td></tr>';
    $mensaje.='<tr>
        <td colspan="4" style="text-align: right"> Envío: </td>
        <td id="celdaenvio">' . $envio->getPrecio() . ' €</td></tr>';

    $mensaje.='<tr>
        <td colspan="4" style="text-align: right"> IVA 21%: </td>
        <td id="celdaIVA">' . round(($carrito->getTotal() + $envio->getPrecio()) * 0.21, 2) . ' €</td></tr> ';

    $mensaje .=' <tr>
        <td colspan="4" style="text-align: right"> TOTAL: </td>
        <td id="celdatotal">' . $total . ' €</td></tr></tbody></table> </body></html>';


    if (!mail($usuario->getCorreo(), $titulo, $mensaje, $headers))
        die("No se pudo enviar el email de confirmacion.");

    session_unset();
    header("Location: gracias.php");
    exit;
}

