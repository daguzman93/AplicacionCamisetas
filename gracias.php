<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <link href = "http://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet">
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link type = "text/css" rel = "stylesheet" href = "css/estilo.css"/>
        <link type = "text/css" rel = "stylesheet" href = "css/carrito.css"/>
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <title>Gracias</title>
        <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>
        <script type="text/javascript" src="js/principal.js"></script>
        <script type="text/javascript" src="js/pedido.js"></script>
        <script defer  src="js/customiseControls.js"></script>

    </head>
    <body>
        <header>
            <link rel="shortcut icon" href="favicon.ico">
            <?php include_once("includes/cabecera.html"); ?>   
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <h5 class="center-align">Gracias por tu compra</h5> 
                    <div class="row">
                        <div class="col l6 offset-l3">
                            <p class="center-align"> Se ha enviado un correo electronico con la informacion relativa a tu pedido</p>
                        </div>

                    </div>

                </div>
            </div>
        </main>

        <footer class="page-footer">
            <?php include_once("includes/piedepagina.html"); ?> 
        </footer>

    </body>
</html> 