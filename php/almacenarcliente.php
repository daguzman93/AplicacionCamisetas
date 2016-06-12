<?php

include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Cliente.php';
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$correo = $_POST['email'];
$nombusu = $_POST['nomusu'];
$pass = $_POST['pass'];
$confpass = $_POST['confpass'];

function validadatos($nombre, $apellido1, $apellido2, $correo, $nombusu, $pass, $confpass) {
    $gdb = new GestorBD();
    $errores = array();
    if (!isset($_POST['nombre']) || $nombre == null) {
        array_push($errores, "Nombre requerido.");
    }
    if (!isset($_POST['apellido1']) || $apellido1 == null) {
        array_push($errores, "Primer apellido requerido.");
    }
    if (!isset($_POST['apellido2']) || $apellido2 == null) {
        array_push($errores, "Segundo apellido requerido.");
    }
    if (!isset($_POST['email']) || $correo == null) {
        array_push($errores, "Correo electrónico requerido.");
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        array_push($errores, "El email introducido no es válido");
    }
    if (!isset($_POST['nomusu']) || $nombusu == null) {
        array_push($errores, "Nombre de usuario requerido");
    } else if ($gdb->existeClienteporNombreUsuario($_POST['nomusu'])) {
        array_push($errores, "Ya existe un usuario con ese nombre de usuario");
    }
    if (!isset($_POST['pass']) || $pass == null) {
        array_push($errores, "Contraseña requerida.");
    } else if (!isset($_POST['confpass']) || $confpass == null) {
        array_push($errores, "Confirmación de contraseña requerida");
    } else if (strcmp($pass, $confpass) !== 0) {
        array_push($errores, "Las contraseñas son diferentes");
    }
    if (!isset($_POST['condiciones'])) {
        array_push($errores, "Acepta los términos y condiciones");
    }

    return $errores;
}

$errores = validadatos($nombre, $apellido1, $apellido2, $correo, $nombusu, $pass, $confpass);
if (count($errores) == 0) {
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $gdb = new GestorBD();
    $apellidos = $apellido1 . " " . $apellido2;
    $gdb->almacenarCliente($nombre, $apellidos, $correo, $nombusu, $hash);
    $fecha = date("Y-m-d");
    $codigoverificacion = rand(0000000000, 9999999999);
    $cliente = $gdb->getClienteporNomUsuario($nombusu);
    $gdb->insertarSolititudRegistro($cliente->getId(), $fecha, $codigoverificacion);
    $headers = "From: danielagustinas@gmail.com";
    $mensaje = "Usted solicito un registro en Mas de mil, n
 Para confirmarlo debe hacer click en el siguiente enlace: n
 http://URL.COM/usuarios/190.226.115.158/confirmar.php?codigo=" . $codigoverificacion;
    if (!@mail("$correo", "Confirmacion de registro en localhost", "$mensaje", "$headers"))
        die("No se pudo enviar el email de confirmacion.");

    echo "Tu cuenta ha sido registrada, sin embargo, esta requiere que la confirmes desde el email que ingresaste en el registro.";
} else {

    $compacto = serialize($errores);
    $param = urlencode($compacto);
    header("Location: ../registro.php?errores=" . $param);
    exit;
}
?>

