<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Cliente.php';
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$correo = $_POST['email'];
$tlfno = $_POST['tlfno'];
$direccion = $_POST['direccion'];
$localidad = $_POST['localidad'];
$provincia = $_POST['provincia'];
$cp = $_POST['cp'];
$nombusu = $_POST['nomusu'];
$pass = $_POST['pass'];
$confpass = $_POST['confpass'];
$hash = sha1($pass);
$gdb = new GestorBD();
$apellidos = $apellido1 . " " . $apellido2;
if (!$gdb->existeClienteporNombreUsuario($nombusu)) {
    $gdb->almacenarCliente($nombre, $apellidos, $correo, $tlfno, $direccion, $localidad, $provincia, $cp, $nombusu, $hash);
    $fecha = date("Y-m-d");
    $codigover = rand(000000, 999999);
    $cliente = $gdb->getClienteporNomUsuario($nombusu);
    $gdb->insertarSolititudRegistro($cliente->getId(), $fecha, $codigover);
    $headers = "From: danielagustinas@gmail.com";
    $mensaje = "Usted solicito un registro en Mas de mil,
 Para confirmarlo debe hacer click en el siguiente enlace: 
 http://localhost/AplicacionCamisetas/clientes/confirmar.php?codigover=" . $codigover;
    if (!mail($correo, "Confirmacion de registro en Mas de Mil", $mensaje, $headers))
        die("No se pudo enviar el email de confirmacion.");

    $mensaje = "Tu cuenta ha sido registrada, sin embargo, esta requiere que la confirmes desde el email que ingresaste en el registro.";
} else {
    $mensaje = 'Ya existe un cliente con ese nombre de usuario';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link type="text/css" rel="stylesheet" href="../css/estilo.css"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Confirmación</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>
        <script type="text/javascript" src="../js/principal.js"></script>
        <script defer  src="../js/customiseControls.js"></script>
        <script type="text/javascript" src="../js/registrocliente.js"></script>

    </head>
    <body>
        <header>
            <link rel="shortcut icon" href="../favicon.ico">
            <?php include_once("../includes/cabecera.html"); ?>   
        </header>
        <main>
            <div class="container ">
                <h5 class="center-align">Confirmación</h5> 
                <div class="row">
                    <div class="col l6 offset-l3">
                        <p><?= $mensaje ?></p>
                        <a href="../index.php"class="waves-effect waves-light btn">Salir</a>
                    </div>
                </div>
            </div>
        </main>
        <footer class="page-footer">
            <?php include_once("../includes/piedepagina.html"); ?> 
        </footer>

    </body>
</html>
