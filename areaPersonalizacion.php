<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Camiseta.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Stock.php';
$gdb = new GestorBD();
$lista = $gdb->getCamisetasporGenero("Hombre");
if (isset($_GET["idcd"])) {
    
} elseif (isset($_GET["idc"])) {
    $camiseta = $gdb->getCamisetaporId($_GET["idc"]);
    $array_colores = $gdb->getColoresCamiseta($camiseta->getId());
    $array_tallas = $gdb->getTallasCamiseta($camiseta->getId());
    usort($array_tallas, "cmp");
} else {
    $camiseta = $lista[0];
    $array_colores = $gdb->getColoresCamiseta($camiseta->getId());
    $array_tallas = $gdb->getTallasCamiseta($camiseta->getId());
    usort($array_tallas, "cmp");
}

function cmp($a, $b) {
    $sizes = array(
        "XXS" => 0,
        "XS" => 1,
        "S" => 2,
        "M" => 3,
        "L" => 4,
        "XL" => 5,
        "XXL" => 6
    );
    $asize = $sizes[$a];
    $bsize = $sizes[$b];
    if ($asize == $bsize) {
        return 0;
    }
    return ($asize > $bsize) ? 1 : -1;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link type="text/css" rel="stylesheet" href="css/estilo.css"/>
        <link type="text/css" rel="stylesheet" href="css/personalizacion.css"/>
        <link type="text/css" rel="stylesheet" href="css/jquery.simplecolorpicker.css"/>
        <link type="text/css" rel="stylesheet" href="css/jquery.simplecolorpicker-glyphicons.css"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Tu lo diseñas</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.5.0/fabric.min.js"></script>
        <script type="text/javascript" src="js/principal.js"></script>
        <script type="text/javascript" src="js/personalizacion.js"></script>
        <script type="text/javascript" src="js/jquery.simplecolorpicker.js"></script>
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
                    <div class="col l1">
                        <p class="center-align" style="color: #0095ad">
                            Tu lo diseñas
                        </p>
                        <img id="delantera" src="img/fotosMasdeMil/<?= $camiseta->getDelantera() ?>">
                        <p class="center-align letra-pequena" style="margin-top: 1px;">delantera</p>
                        <img  id="trasera"  src="img/fotosMasdeMil/<?= $camiseta->getTrasera() ?>">
                        <p class="center-align letra-pequena" style="margin-top: 1px;">trasera</p>
                        <a id="previsualizar" class="waves-effect waves-light btn z-depth-0">Previsualizar</a>

                    </div>

                    <div class="col l5">
                        <img  id="area-camiseta"   src="img/fotosMasdeMil/<?= $camiseta->getDelantera() ?>">

                        <div id="drawingArea">					
                            <canvas id="tcanvas" ></canvas>

                        </div>
                    </div>
                    <div class="col l6">

                        <div class=" col l3">
                            <img class="icono-menu"src="img/icono_elige_tu_producto.png">
                            <a id="elige-producto" class="waves-effect waves-light btn z-depth-0 boton-active">Elige tu producto</a>
                        </div>
                        <div class=" col l3">
                            <img class="icono-menu" src="img/icono-elige_tu_diseño.png">
                            <a id="elige-diseno" class="waves-effect waves-light btn z-depth-0">Elige tu diseño</a>
                        </div>
                        <div class=" col l3">
                            <img class="icono-menu" src="img/icono_sube_tu_imagen.png">
                            <a id="sube-imagen" class="waves-effect waves-light btn z-depth-0">Sube tu imagen</a>
                        </div>
                        <div class=" col l3">
                            <img class="icono-menu" src="img/icono_escribe_tu_texto.png">
                            <a id="escribe-texto" class="waves-effect waves-light btn z-depth-0">Escribe tu texto</a>
                        </div>

                        <div class="seccion">
                            <div id="area-modificable">
                                <div class="col l12">
                                    <div class="col l12">
                                        <p class="letra-pequena">Selecciona la prenda que deseas</p>
                                    </div>
                                </div>
                                <div class="col l12">
                                    <div class="col l2">
                                        <a id="Hombre" class="active-genero" href="#">HOMBRE</a>
                                    </div>
                                    <div class="col l2">
                                        <a id="Mujer"  class="genero" href="#">MUJER</a>
                                    </div>
                                    <div class="col l2">
                                        <a id="Niño" class="genero" href="#">NIÑO</a>
                                    </div>

                                </div>

                                <div id="imagenes-camisetas">
                                    <?php for ($i = 0; $i < count($lista); $i++): ?>
                                        <div class="col l2 ">
                                            <a href="areaPersonalizacion.php?idc=<?= $lista[$i]->getID() ?>"><img id="<?= $lista[$i]->getID() ?>" class="images-genero"  src="img/fotosMasdeMil/<?= $lista[$i]->getDelantera() ?>"></a>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>  
                            <div id="colores-camiseta">
                                <div class="col l12">
                                    <div class="col l12">
                                        <p class="letra-pequena">Elige tu color</p>
                                    </div>

                                </div>
                                <div class="col l12">
                                    <?php for ($i = 0; $i < count($array_colores); $i++): ?>
                                        <div class="col l1">
                                            <a class="color btn-floating z-depth-0 <?= $array_colores[$i] ?>"></a>
                                        </div>
                                    <?php endfor; ?>


                                </div>
                            </div>
                            <div id="tallas-camiseta">
                                <div class="col l12">
                                    <div class="col l12">
                                        <p class="letra-pequena">Elige tu talla</p>
                                    </div>

                                </div>
                                <div class="col l12">
                                    <?php for ($i = 0; $i < count($array_tallas); $i++): ?>
                                        <div class="col l1">
                                            <a class="color btn-floating z-depth-0 white"><?= $array_tallas[$i] ?></a>
                                        </div>
                                    <?php endfor; ?>

                                </div>
                            </div>
                            <div class="col l12">
                                <div class="col l3">
                                    <p id='precio'><?= $camiseta->getPrecio() ?> €</p>
                                </div>
                            </div> 
                            <div class="col l12">
                                <div class="col l5">
                                    <a id="anadir-carro" class="waves-effect waves-light btn z-depth-0"><i class="material-icons right">shopping_cart</i>Añadir al carrito</a>
                                </div>
                            </div>

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