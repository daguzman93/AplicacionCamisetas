<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Cliente.php';
$nomusu = $_POST['usuario'];
$pass = htmlspecialchars(trim(strip_tags($_POST['pass'])));
$gdb = new GestorBD();
$errores = array();
if ($gdb->existeClienteporNombreUsuario($nomusu)) {
    $cliente = $gdb->getClienteporNomUsuario($nomusu);
    if ($cliente->getEstado() == 'activo') {
        if (sha1($pass) == $cliente->getPass()) {
            session_start();
            $_SESSION['cliente'] = serialize($cliente);
            header("Location: ../clientes/index.php");
            exit;
        } else {
            array_push($errores, 'La contraseña no es valida');
        }
    } else {
        array_push($errores, 'Su cuenta no ha sido confirmada');
    }
} else {
    array_push($errores, 'El nombre de usuario o la contraseña no son correctos');
}
$compacto = serialize($errores);
$param = urlencode($compacto);
header("Location: ../login.php?errores=" . $param);
exit;

