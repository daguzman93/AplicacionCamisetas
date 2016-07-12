<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Cliente.php';
session_start();
if (isset($_SESSION['cliente'])) {
    $cliente= unserialize($_SESSION['cliente']);?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <link href = "http://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet">
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link type = "text/css" rel = "stylesheet" href = "../css/estilo.css"/>
      
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <title>Completar tu pedido</title>
        <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>
        <script type="text/javascript" src="../js/principal.js"></script>
        
    </head>
    <body>
        <header>
            <link rel="shortcut icon" href="../favicon.ico">
<?php include_once("../includes/cabeceracliente.html"); ?>   
        </header>
        <main>
            <div class="container">
                 <div class="row">
                    <h5 class="center-align">Bienvenido <?= $cliente->getNombre()?></h5> 
                </div>
            </div>
        </main>
        <footer class="page-footer">
<?php include_once("../includes/piedepagina.html"); ?> 
        </footer>

    </body>
</html> 
<?php }
?>