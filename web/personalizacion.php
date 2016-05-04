<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link type="text/css" rel="stylesheet" href="css/estilo.css"/>
        <link type="text/css" rel="stylesheet" href="css/personalizacion.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Tu lo diseñas</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.5.0/fabric.min.js"></script>
        <script type="text/javascript" src="js/principal.js"></script>
        <script type="text/javascript" src="js/personalizacion.js"></script>

    </head>
    <body>
        <header>
            <?php include("includes/cabecera.html"); ?>   
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col l1">
                        <p>
                            Tu lo diseñas
                        </p>
                        <img id="delantera" class="responsive-img" src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">
                        <p>delantera</p>
                        <img  id="trasera" class="responsive-img" src="img/fotosMasdeMil/camisetas/traseraMangaCortaHombre.jpg">
                        <p>trasera</p>
                    </div>
                    <div class="col l5">
                        <img  id="area-camiseta" class="responsive-img"  src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                        <div id="drawingArea">					
                            <canvas id="tcanvas" ></canvas>

                        </div>


                    </div>
                    <div class="col l6">

                        <div class=" col l3">
                            <img  class="responsive-img"  src="img/elige_tu_producto_inactivo.png">
                        </div>
                        <div class=" col l3">
                            <img  class="responsive-img"  src="img/elige_tu_diseño_inactivo.png">
                        </div>
                        <div class=" col l3">
                            <img  class="responsive-img"  src="img/sube_tu_imagen_inactivo.png">
                        </div>
                        <div class=" col l3">
                            <img  class="responsive-img"  src="img/escribe_tu_texto_inactivo.png">
                        </div>
                        <div class="col l12">
                            <div class="col l12">
                                <p>Selecciona la prenda que deseas</p>
                            </div>
                        </div>
                        <div class="col l12">
                            <div class="col l2">
                                <a href="#">HOMBRE</a>
                            </div>
                            <div class="col l2">
                                <a href="#">MUJER</a>
                            </div>
                            <div class="col l2">
                                <a href="#">NIÑO</a>
                            </div>

                        </div>
                        
                        <div class="col l2">
                            <img  class="responsive-img"  src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                        </div>
                        <div class="col l2">
                             <img  class="responsive-img"  src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                        </div>
                        <div class="col l2">
                             <img  class="responsive-img"  src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                        </div>
                        <div class="col l2">
                             <img  class="responsive-img"  src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                        </div>
                        <div class="col l2">
                             <img  class="responsive-img"  src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                        </div>
                        <div class="col l2">
                             <img  class="responsive-img"  src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                        </div>
                        <div class="col l12">
                            <div class="col l12">
                                <p>Elige tu color</p>
                            </div>
                            
                        </div>
                        <div class="col l12">
                            <div class="col l1">
                                <a class="btn-floating z-depth-0"></a>
                                
                            </div>
                             <div class="col l1">
                                <a class="btn-floating z-depth-0"></a>
                            </div>
                             <div class="col l1">
                                <a class="btn-floating z-depth-0"></a>
                            </div>
                             <div class="col l1">
                                <a class="btn-floating z-depth-0"></a>
                            </div>
                             <div class="col l1">
                                <a class="btn-floating z-depth-0"></a>
                            </div>
                             <div class="col l1">
                                <a class="btn-floating z-depth-0"></a>
                            </div>
                             <div class="col l1">
                                <a class="btn-floating z-depth-0"></a>
                            </div>
                             <div class="col l1">
                                <a class="btn-floating z-depth-0"></a>
                            </div>
                             <div class="col l1">
                                <a class="btn-floating z-depth-0"></a>
                            </div>
                            
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