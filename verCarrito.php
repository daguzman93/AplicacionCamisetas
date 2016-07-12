<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Carrito.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/CamisetaDefinida.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Camiseta.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Diseno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/LineaPedido.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
session_start();
if (isset($_SESSION["carrito"])) {
    $carrito = unserialize($_SESSION['carrito']);
    $lineas = $carrito->getProductos();
    $gestor = new GestorBD();
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
        <meta charset = "UTF-8">
        <link href = "http://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet">
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link type = "text/css" rel = "stylesheet" href = "css/estilo.css"/>
        <link type = "text/css" rel = "stylesheet" href = "css/carrito.css"/>
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <title>Tu carrito</title>
        <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <script type="text/javascript" src="js/principal.js"></script>
        <script type="text/javascript" src="js/carrito.js"></script>

    </head>
    <body>
        <header>
            <link rel="shortcut icon" href="favicon.ico">
            <?php include_once("includes/cabecera.html"); ?>   
        </header>

        <main>
            <div class="container">
                <div class="row">
                    <h5 class="center-align">Carrito de la compra</h5> 

                    <?php
                    if (!isset($carrito) || ($carrito->getNumProductos() == 0)) {
                        ?>
                        <div class="row">
                            <div class="col l6 offset-l3">
                                <p class="center-align"> Tu carrito de la compra esta vacío </p>
                            </div>

                        </div>
                    <?php } else {
                        ?>
                        <div class="row">
                            <div class="col l8 offset-l2">
                                <table>
                                    <thead>
                                        <tr>
                                            <th colspan="2">Producto</th>
                                            <th>Talla</th>
                                            <th>Cantidad</th>
                                            <th colspan="2">Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
//                                        session_destroy();                                      
                                        for ($i = 0; $i < $carrito->getNumProductos(); $i++) {                                            
                                            $modelocamiseta = $gestor->getCamisetaporId($lineas[$i]->getCamiseta()->getId());
                                            $tallas = $gestor->getTallasCamiseta($modelocamiseta->getId());
                                            usort($tallas, "cmp");
                                            $prep = array_search($lineas[$i]->getTalla(), $tallas);
                                           
                                            ?>
                                            <tr>
                                                <td><a href="areaPersonalizacion.php"><img class="camiseta-miniatura"  src="img/fotosMasdeMil/<?= $modelocamiseta->getDelantera() ?>" style="background-color:<?= $lineas[$i]->getCamiseta()->getColor() ?> "></a></td>
                                                <td><?= $modelocamiseta->getNombre() ?></td>
                                                <td ><select id="talla<?= $i ?>" class="tallas">
                                                        <option value="<?= $lineas[$i]->getTalla() ?>"  selected><?= $lineas[$i]->getTalla() ?></option>
                                                        <?php for ($j = 0; $j < count($tallas); $j++): ?>
                                                            <option value="<?= $tallas[$j] ?>" ><?= $tallas[$j] ?></option>
                                                        <?php endfor; ?>
                                                    </select></td>
                                                    <td><input id="cantidad<?= $i ?>" class="cantidad"type="number" name="quantity" min="1" max="20" value="<?= $lineas[$i]->getCantidad() ?>"></td>
                                                    <td id="preciolinea<?= $i ?>"><?= $lineas[$i]->getPrecio() ?> €</td>
                                                <td></td>
                                                <td><a href=""class="borrar-linea waves-effect waves-light" id="<?= $i ?>"><i class="material-icons ">delete</i></a></td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="4" style="text-align: right"> TOTAL: </td>
                                            <td id="total"><?= $carrito->getTotal() ?> € </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div id="modalborracarrito" class="modal modal-fixed-footer"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col l3 offset-l8">
                                <a href="pedido.php" class="waves-effect waves-light btn z-depth-0">Tramitar pedido</a >
                            </div>

                        </div>
                    <?php } ?>
                </div>

            </div>
        </main>
        <footer class="page-footer">
            <?php include_once("includes/piedepagina.html"); ?> 
        </footer>

    </body>
</html> 
<script type="text/javascript">
    $(document).ready(function () {
        $('select').material_select();
    });
</script>