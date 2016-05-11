<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link type="text/css" rel="stylesheet" href="css/estilo.css"/>
        <link type="text/css" rel="stylesheet" href="css/principal.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>MAS DE MIL</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <script type="text/javascript" src="js/principal.js"></script>

    </head>
    <body>
        <header>
            <?php include("includes/cabecera.html"); ?>   
        </header>
        <main>
            <div class="slider ">
                <ul class="slides">
                    <li>
                        <img  src="img/imagen_slider_1.jpg"> <!-- random image -->
<!--                        <div class="caption center-align">
                            <h3>This is our big Tagline!</h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>-->
                    </li>
<!--                    <li>
                        <img src="img/imagen_slider_2.jpg">  random image 
                        <div class="caption left-align">
                            <h3>Left Aligned Caption</h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>
                    </li>-->
                    <li>
                        <img src="img/imagen_slider_3.jpg"> <!-- random image -->
                        <div class="caption right-align">
                            <h3>Right Aligned Caption</h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>
                    </li>
                    <li>
                        <img src="img/imagen_slider_4.jpg"> <!-- random image -->
                        <div class="caption right-align">
                            <h3>This is our big Tagline!</h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="container ">
                <h5 class="center-align">Nuestras camisetas más vendidas</h5> 
                <div class="row">
                    <div class="col l2 offset-l1 s4">
                        <img class="materialboxed responsive-img" src="img/fotosMasdeMil/camisetas/modeloMangaCortaHombre.jpg">
                    </div>
                    <div class="col l2 s4">
                        <img class="materialboxed responsive-img"  src="img/fotosMasdeMil/camisetas/modeloMangaCortaHombre.jpg">
                    </div>
                    <div class="col l2 s4">
                        <img class="materialboxed responsive-img"  src="img/fotosMasdeMil/camisetas/modeloMangaCortaHombre.jpg">
                    </div>
                    <div class="col l2 s4 offset-s2">
                        <img class="materialboxed responsive-img"  src="img/fotosMasdeMil/camisetas/modeloMangaCortaHombre.jpg">
                    </div>
                    <div class="col l2 s4">
                        <img class="materialboxed responsive-img"  src="img/fotosMasdeMil/camisetas/modeloMangaCortaHombre.jpg">
                    </div>

                </div>
                <h5 class="center-align">Nuestras novedades del mes</h5> 
                <div class="row">
                    <div class="col l2 offset-l1 s4">
                        <img class="materialboxed responsive-img" src="img/fotosMasdeMil/camisetas/modeloMangaCortaHombre.jpg">
                    </div>
                    <div class="col l2 s4">
                        <img class="materialboxed responsive-img"  src="img/fotosMasdeMil/camisetas/modeloMangaCortaHombre.jpg">
                    </div>
                    <div class="col l2 s4">
                        <img class="materialboxed responsive-img"  src="img/fotosMasdeMil/camisetas/modeloMangaCortaHombre.jpg">
                    </div>
                    <div class="col l2 s4 offset-s2">
                        <img class="materialboxed responsive-img"  src="img/fotosMasdeMil/camisetas/modeloMangaCortaHombre.jpg">
                    </div>
                    <div class="col l2 s4">
                        <img class="materialboxed responsive-img"  src="img/fotosMasdeMil/camisetas/modeloMangaCortaHombre.jpg">
                    </div>

                </div>
                <div class="row">
                    <div class="col l3  s12">
                        <div class="col l3 m2 s2">
                            <img  id="camion" class="envio responsive-img" src="img/envio.png">
                        </div>
                        <div class="col l9 m10 s10">
                            <h5 class="left-align">Envío gratis</h5> 
                            <p class="envio" >A partir de 3 productos</p>
                        </div>
                    </div>

                    <div class="col l5  s12">
                        <div class="col l2 m2 s2">
                            <img id="horas" class=" envio responsive-img" src="img/24h.png">
                        </div>
                        <div class="col l10 m10 s10">
                            <h5 class="left-align">Te lo entregamos cuando quieras</h5> 
                            <p class="envio" >Tu decides el servicio de entrega. Si tienes prisa te lo entregamos en 24 h.</p>
                        </div>

                    </div>
                    <div class="col l4  s12">
                        <div class="col l2 m2 s2">
                            <img  id="camion" class="envio responsive-img" src="img/paquete.png">
                        </div>
                        <div class="col l10 m10 s10">
                            <h5 class="left-align">Te lo ponemos fácil</h5> 
                            <p class="envio">Cambios y devoluciones gratuitas durante 30 días.</p>
                        </div>

                    </div>

                </div>

            </div>

        </main>
        <footer class="page-footer">
            <?php include("includes/piedepagina.html"); ?> 
        </footer>

    </body>
</html>
