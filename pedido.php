<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Carrito.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/CamisetaDefinida.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Camiseta.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Diseno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/LineaPedido.php';
session_start();
$provincias = array("A Coruña", "Álava", "Albacete", "Alicante", "Almería", "Asturias", "Ávila", "Badajoz", "Baleares", "Barcelona", "Bizkaia", "Burgos", "Cáceres", "Cádiz", "Cantabria", "Castellón", "Ceuta", "Ciudad Real", "Córdoba", "Cuenca", "Gerona", "Gipuzkoa", "Girona", "Granada", "Guadalajara", "Guipuzcoa", "Huelva", "Huesca", "Illes Balears", "Jaén", "La Coruña", "La Rioja", "Las Palmas", "León", "Lérida", "Lleida", "Lugo", "Madrid", "Málaga", "Melilla", "Murcia", "Navarra", "Orense", "Ourense", "Palencia", "Pontevedra", "Salamanca", "Santa Cruz de Tenerife", "Segovia", "Sevilla", "Soria", "Tarragona", "Teruel", "Toledo", "Valencia", "Valladolid", "Vizcaya", "Zamora", "Zaragoza");
if (isset($_SESSION["carrito"])) {
    $gdb = new GestorBD();
    $envios = $gdb->getEnvios();
    $carrito= unserialize($_SESSION['carrito']);
    $lineas = $carrito->getProductos();  

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
        <title>Completar tu pedido</title>
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
                    <h5 class="center-align">Rellena la siguiente información para completar tu pedido</h5> 
                </div>
                <div class="row">
                    <form id="datospedido" class="col l5 offset-l1" method="POST">
                        <?php if ((isset($errores)) && (count($errores) > 0)) : ?>
                            <div class="row">
                                <div class="input-field col l6 offset-l3">
                                    <?php for ($i = 0; $i < count($errores); $i++) : ?>
                                        <p class="center-align red-text"> <?= $errores[$i] ?> </p>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col l12"> 
                            <h6 >Dirección de facturación</h6>
                            <div class="row">
                                <div class="input-field col l8">
                                    <input id="nombre" name="nombre" type="text" data-error=".errornombre" value="<?php if(isset($_GET['nom'])){echo urldecode($_GET['nom']);} ?>">
                                    <label for="nombre">Nombre</label>
                                    <div class="errornombre red-text"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l6">
                                    <input id="apellido1"  name="apellido1" type="text" data-error=".errorapellido1" value="<?php if(isset($_GET['ap1'])){echo urldecode($_GET['ap1']);}?>">
                                    <label for="apellido1">Primer apellido</label>
                                    <div class="errorapellido1 red-text"></div>
                                </div>
                                <div class="input-field col l6">
                                    <input id="apellido2" name="apellido2" type="text" data-error=".errorapellido2" value="<?php if(isset($_GET['ap2'])){echo urldecode($_GET['ap2']);}?>">
                                    <label for="apellido2">Segundo apellido</label>
                                    <div class="errorapellido2 red-text"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l7">
                                    <input id="email" name="email" type="text" data-error=".errorEmail" value="<?php if(isset($_GET['email'])){echo urldecode($_GET['email']);}?>">
                                    <label for="email">Correo electrónico</label>
                                    <div class="errorEmail red-text"></div>
                                </div>


                                <div class="input-field col l5">
                                    <input id="tlfno" name="tlfno" type="text" data-error=".errortlfno" maxlength="9" value="<?php if(isset($_GET['tlfno'])){echo urldecode($_GET['tlfno']);}?>">
                                    <label for="tlfno">Teléfono</label>
                                    <div class="errortlfno red-text"></div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col l7">
                                    <input id="direccion" name="direccion" type="text" data-error=".errordireccion" value="<?php if(isset($_GET['dir'])){echo urldecode($_GET['dir']);}?>">
                                    <label for="direccion">Dirección</label>
                                    <div class="errordireccion red-text"></div>
                                </div>
                                <div class="input-field col l5">
                                    <input id="localidad" name="localidad" type="text" data-error=".errorlocalidad" value="<?php if(isset($_GET['loc'])){echo urldecode($_GET['loc']);}?>">
                                    <label for="localidad">Localidad</label>
                                    <div class="errorlocalidad red-text"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l5">
                                    <select  id="provincia" name="provincia" data-error=".errorprovincia" > 
                                        <?php if ((isset($_GET['prov'])) && (urldecode($_GET['prov'])==$provincias[$i])) : ?> 
                                        <option value="" disabled>Elige una opcion</option>
                                        <?php else: ?>
                                        <option value="" disabled selected>Elige una opcion</option>
                                         <?php endif; ?>
                                        
                                        <?php for ($i = 0; $i < count($provincias); $i++) : ?>
                                        <?php if ((isset($_GET['prov'])) && (urldecode($_GET['prov'])==$provincias[$i])) : ?> 
                                        <option value="<?= $provincias[$i] ?>" selected="selected"><?= $provincias[$i] ?></option>                                           
                                            <?php else: ?>
                                            <option value="<?= $provincias[$i] ?>"><?= $provincias[$i] ?></option>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </select>
                                    <label for="provincia">Provincia</label>
                                    <div class="errorprovincia red-text"></div>
                                </div>

                                <div class="input-field col l3 offset-l4">
                                    <input id="cp" name="cp" type="text" data-error=".errorcp" maxlength="5" value="<?php if(isset($_GET['cp'])){echo urldecode($_GET['cp']);}?>">
                                    <label for="cp">C. P.</label>
                                    <div class="errorcp red-text"></div>
                                </div>
                            </div>


                        </div>
                        
                            <div class="row">
                                <div class="col l6">
                                <h6 >Tipo de envío</h6>
                                <?php for ($i = 0; $i < count($envios); $i++) : ?>
                                    <p>
                                        <?php if ($i==0) : ?> 
                                        <input type="radio" name="envio" id="<?= $envios[$i]->getNombre() ?>" data-error=".errorenvio" value="<?= $envios[$i]->getNombre() ?>" checked="checked" />
                                         <?php else: ?>
                                        <input type="radio" name="envio" id="<?= $envios[$i]->getNombre() ?>" data-error=".errorenvio" value="<?= $envios[$i]->getNombre() ?>"/>
                                        <?php endif; ?>
                       
                                        <label for="<?= $envios[$i]->getNombre() ?>"><?= $envios[$i]->getNombre() ?> (+<?= $envios[$i]->getPrecio() ?> €)</label>
                                    </p>
                                <?php endfor; ?>
                                <div class="errorenvio red-text"></div>
                                </div>
                                <div class="col l5 offset-l1">
                                <h6 >Forma de pago</h6>
                                <p>                                  
                                    <input type="radio" name="tipopago" id="tarjeta" data-error=".errortipopago" value="Tarjeta de credito" checked="checked"/>
                                    <label for="tarjeta">Tarjeta de credito</label>
                                </p>
                                <p>
                                   
                                   
                                    <input type="radio" name="tipopago" id="contrare" data-error=".errortipopago" value="Contrareembolso"/>
                                    
                                    <label for="contrare">Contrareembolso</label>
                                </p>
                                <p>
                                    
                                    <input type="radio" name="tipopago" id="paypal" data-error=".errortipopago" value="PayPal"/>                                   
                                    <label for="paypal"><image src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_pponly_142x27.png"></label> 
                                                                  
                                </p>
                                <div class="errortipopago red-text"></div>
                            </div>
                            </div>

                       
                <div class="row">

                    <div class="col l6 offset-l3">
                        <!--<a class="waves-effect waves-light btn z-depth-0" href="verCarrito.php">Volver</a>-->                   
                        <button  class="waves-effect waves-light btn z-depth-0" type="submit" >Pagar y finalizar</button >
                    </div>
                            
                </form>
                </div>
                </form>
                    
                    <div class="col l5 offset-l1">
                        <h6 >Tu pedido</h6>
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="2">Producto</th>
                                    <th>Talla</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < $carrito->getNumProductos(); $i++) {
                                    $modelocamiseta = $gdb->getCamisetaporId($lineas[$i]->getCamiseta()->getId());
                                    ?>
                                    <tr>
                                        <td><img class="camiseta-miniatura"  src="img/fotosMasdeMil/<?= $modelocamiseta->getDelantera() ?>" style="background-color:<?= $lineas[$i]->getCamiseta()->getColor() ?> "></td>
                                        <td><?= $modelocamiseta->getNombre() ?></td>
                                        <td ><?= $lineas[$i]->getTalla() ?></td>
                                        <td><?= $lineas[$i]->getCantidad() ?></td>
                                        <td id="preciolinea<?= $i ?>"><?= $lineas[$i]->getPrecio() ?> €</td>

                                    </tr>
                                    <?php
                                }
                                $total =  round((($carrito->getTotal()+$envios[0]->getPrecio())*0.21) + $carrito->getTotal()+ $envios[0]->getPrecio(),2) ;
                                ?>
                                <tr>
                                    <td colspan="4" style="text-align: right"> Subtotal: </td>
                                    <td ><?= $carrito->getTotal() ?> € </td>
                                </tr>
                                
                                 <tr>
                                    <td colspan="4" style="text-align: right"> Envío: </td>
                                    <td id="celdaenvio"><?= $envios[0]->getPrecio()?> € </td>
                                </tr>   
                                <tr>
                                    <td colspan="4" style="text-align: right"> IVA 21%: </td>
                                    <td id="celdaIVA"><?= round(($carrito->getTotal()+$envios[0]->getPrecio())*0.21,2) ?> € </td>
                                </tr>                                
                                <tr>
                                    <td colspan="4" style="text-align: right"> TOTAL: </td>
                                    <td id="celdatotal"><?= $total ?> € </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
<form id="formpaypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input TYPE="hidden" name="charset" value="utf-8">
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="danielagustinas-facilitator@gmail.com">
                        <input name= "currency_code" value = "EUR" type = "hidden">
                        <input type="hidden" name="return" value="http://localhost/AplicacionCamisetas/finalizarPedido.php">
                        <input type="hidden" name="cancel_return" value="http://localhost/AplicacionCamisetas/cancelarPago.php">
                        <input name ="item_name" value = "Pedido en Mas de Mil " type = "hidden">
                        <input name ="amount" value = "<?= round(($carrito->getTotal() + $precio) * 0.21 + $carrito->getTotal() + $precio, 2) ?>" type = "hidden">
                        <input name ="shipping" value = "0" type = "hidden">
                        <input type="hidden" name="first_name" value="">
                        <input type="hidden" name="last_name" value="">
                        <input type="hidden" name="address1" value="">
                        <input type="hidden" name="city" value="">
                         <input type="hidden" name="state" value="">
                        <input type="hidden" name="night_phone_a" value="">
                        <input type="hidden" name="zip" value="">
                        <input type="hidden" name="lc" value="es">
                        <input type="hidden" name="country" value="ES">
                        
                    </form>

        </div>
    </div>
</main>
<footer class="page-footer">
    <?php include_once("includes/piedepagina.html"); ?> 
</footer>

</body>
</html> 
