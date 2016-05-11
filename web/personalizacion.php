<!DOCTYPE html>
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
                        <img  id="area-camiseta"   src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                        <div id="drawingArea">					
                            <canvas id="tcanvas" ></canvas>

                        </div>


                    </div>
                    <div class="col l6">

                        <div class=" col l3">
                            <img  class="responsive-img"  id="elige-producto" src="img/elige_tu_producto_activo.png">
                        </div>
                        <div class=" col l3">
                            <img  class="responsive-img"  id="elige-diseno" src="img/elige_tu_diseño_inactivo.png">
                        </div>
                        <div class=" col l3">
                            <img  class="responsive-img" id="sube-imagen" src="img/sube_tu_imagen_inactivo.png">
                        </div>
                        <div class=" col l3">
                            <img  class="responsive-img"  id="escribe-texto" src="img/escribe_tu_texto_inactivo.png">
                        </div>

                        <div class="seccion">
                            <div class="col l12">
                                <div class="col l12">
                                    <p>Selecciona la prenda que deseas</p>
                                </div>
                            </div>
                            <div class="col l12">
                                <div class="col l2">
                                    <a id="Hombre" href="#">HOMBRE</a>
                                </div>
                                <div class="col l2">
                                    <a id="Mujer" href="#">MUJER</a>
                                </div>
                                <div class="col l2">
                                    <a id="Niño" href="#">NIÑO</a>
                                </div>

                            </div>

                            <div id="imagenes-camisetas">
                                <div class="col l2">
                                    <img  class="responsive-img images-genero"  src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                                </div>
                                <div class="col l2">
                                    <img  class="responsive-img images-genero"  src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                                </div>
                                <div class="col l2">
                                    <img  class="responsive-img images-genero"  src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                                </div>
                                <div class="col l2">
                                    <img  class="responsive-img images-genero"  src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                                </div>
                                <div class="col l2">
                                    <img  class="responsive-img images-genero"  src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                                </div>
                                <div class="col l2">
                                    <img  class="responsive-img images-genero"  src="img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg">

                                </div>
                            </div>
                            <div class="col l12">
                                <div class="col l12">
                                    <p>Elige tu color</p>
                                </div>

                            </div>
                            <div class="col l12">
                                <div class="col l1">
                                    <a class="color btn-floating z-depth-0 white"></a>
                                </div>
                                <div class="col l1">
                                    <a class=" color btn-floating z-depth-0 black"></a>
                                </div>
                                <div class="col l1">
                                    <a class="color btn-floating z-depth-0 red"></a>
                                </div>
                                <div class="col l1">
                                    <a class="color btn-floating z-depth-0 blue"></a>
                                </div>
                                <div class="col l1">
                                    <a class="color btn-floating z-depth-0 green"></a>
                                </div>
                                <div class="col l1">
                                    <a class="color btn-floating z-depth-0 orange"></a>
                                </div>
                                <div class="col l1">
                                    <a class="color btn-floating z-depth-0 grey"></a>
                                </div>
                                <div class="col l1">
                                    <a class="color btn-floating z-depth-0 yellow"></a>

                                </div>
                                <div class="col l1">
                                    <a class="color btn-floating z-depth-0"></a>
                                </div>


                            </div>
                            <div class="col l12">
                                <div class="col l12">
                                    <p>Elige tu talla</p>
                                </div>

                            </div>
                            <div class="col l12">
                                <div class="col l1">
                                    <a class="color btn-floating z-depth-0 white">S</a>
                                </div>
                                <div class="col l1">
                                    <a class=" color btn-floating z-depth-0 white">M</a>
                                </div>
                                <div class="col l1">
                                    <a class="color btn-floating z-depth-0 white">L</a>
                                </div>
                                <div class="col l1">
                                    <a class="color btn-floating z-depth-0 white">XL</a>
                                </div>
                                <div class="col l1">
                                    <a class="color btn-floating z-depth-0 white">XXL</a>
                                </div>
                                <div class="col l1">
                                    <a class="color btn-floating z-depth-0 white">3XL</a>
                                </div>
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