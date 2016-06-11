<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

$status = $_SERVER['REDIRECT_STATUS'];
switch ($status) {
    case 400:
        $codigoerror = '400 Bad Request';
        $mensaje = 'La solicitud contiene sintaxis errónea.';
        break;
    case 401:
        $codigoerror = '401 Unauthorized';
        $mensaje = 'El recurso solicitado requiere de autenticación.';
        break;

    case 403:
        $codigoerror = '403 Forbidden';
        $mensaje = 'El servidor no puede responder con el recurso porque se ha denegado el acceso.';
        break;
    case 404:
        $codigoerror = '404 Not Found';
        $mensaje = 'Recurso no encontrado.';
        break;
    case 500:
        $codigoerror = '500 Internal Server Error';
        $mensaje = 'Error producido en el servidor.';
        break;
}
?>
<html>
    <head>
        <meta charset = "UTF-8">
        <link href = "http://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet">
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link type = "text/css" rel = "stylesheet" href = "css/estilo.css"/>
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <title>Error</title>
        <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>
        <script type="text/javascript" src="js/principal.js"></script>
        <script defer  src="js/customiseControls.js"></script>
        

    </head>
    <body>
        <header>
            <link rel="shortcut icon" href="favicon.ico">
            <?php include_once("includes/cabecera.html"); ?>   
        </header>
        <main>
            <div class="container ">
                <h5 class="center-align"><?= $codigoerror ?> </h5>
                <div class="row">
                    <div class="col l6 offset-l3">
                        <p class="center-align">
                            <?= $mensaje ?>
                            <br>Pulse en Salir para abandonar esta página.
                        </p>
                    </div>

                </div>
                <div class="row">
                    
                        <a id="salir" href="index.php" class="waves-effect waves-light btn z-depth-0 col l2 offset-l5">Salir</a>
                    
                </div>
            </div>
        </main>
        <footer class="page-footer">
            <?php include_once("includes/piedepagina.html"); ?> 
        </footer>

    </body>
</html>