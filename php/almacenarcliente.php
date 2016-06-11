<?php

include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
$errores = validadatos();

if (count($errores) == 0) {
    
}else{
    
}

function validadatos() {
    $gdb = new GestorBD();
    $errores = array();
    if (!isset($_POST['nombre'])) {
        array_push($errores, "Nombre requerido");
    }
    if (!isset($_POST['apellido1'])) {
        array_push($errores, "Primer apellido requerido");
    }
    if (!isset($_POST['apellido2'])) {
        array_push($errores, "Segundo apellido requerido");
    }
    if (!isset($_POST['email'])) {
        array_push($errores, "Contraseña requerida");
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        array_push($errores, "El email introducido no es válido");
    }
    if (!isset($_POST['nomusu'])) {
        array_push($errores, "Nombre de usuario requerido");
    } else if ($gdb->existeClienteporNombreUsuario($_POST['nomusu'])) {
        array_push($errores, "Ya existe un usuario con ese nombre de usuario");
    }
    if (!isset($_POST['pass'])) {
        array_push($errores, "Contraseña requerida");
    } else if (!isset($_POST['confpass'])) {
        array_push($errores, "Confirmación de contraseña requerida");
    } else if (!strcmp($_POST['pass'], $_POST['confpass'])) {
        array_push($errores, "Las contraseñas son diferentes");
    }
    if (!isset($_POST['condiciones'])) {
        array_push($errores, "Acepta los términos y condiciones");
    }

    return $errores;
}

//$hash = password_hash($pass, PASSWORD_DEFAULT);
//$gdb = new GestorBD();
////$gdb->almacenarCliente($nombre, $apellido1 . $apellido2, $email, $nomusu, $hash);
//$fecha = date("Y-m-d");
