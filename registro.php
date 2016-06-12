<?php
if (isset($_GET['errores'])) {
    $aux = stripcslashes($_GET['errores']);
    $errores = unserialize($aux);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link type="text/css" rel="stylesheet" href="css/estilo.css"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Registro usuarios</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>
        <script type="text/javascript" src="js/principal.js"></script>
        <script defer  src="js/customiseControls.js"></script>
        <script type="text/javascript" src="js/registrocliente.js"></script>

    </head>
    <body>
        <header>
            <link rel="shortcut icon" href="favicon.ico">
            <?php include_once("includes/cabecera.html"); ?>   
        </header>
        <main>
            <div class="container ">
                <h5 class="center-align">Registro</h5> 
                <div class="row">
                    <div class="col l6 offset-l3">
                        <p>Introduce tus datos personales junto con un nombre de usuario y contraseña:</p>
                        <form id="registrocliente" class="col l12" method="POST" action="php/almacenarcliente.php">
                            <?php if ((isset($errores)) && (count($errores) > 0)) : ?>
                                <div class="row">
                                    <div class="input-field col l6 offset-l3">
                                        <?php for ($i = 0; $i < count($errores); $i++) : ?>
                                            <p class="center-align red-text"> <?= $errores[$i] ?> </p>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="input-field col l8">
                                    <input id="nombre" name="nombre" type="text" data-error=".errornombre">
                                    <label for="nombre">Nombre</label>
                                    <div class="errornombre red-text"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l6">
                                    <input id="apellido1"  name="apellido1" type="text" data-error=".errorapellido1">
                                    <label for="apellido1">Primer apellido</label>
                                    <div class="errorapellido1 red-text"></div>
                                </div>
                                <div class="input-field col l6">
                                    <input id="apellido2" name="apellido2" type="text" data-error=".errorapellido2">
                                    <label for="apellido2">Segundo apellido</label>
                                    <div class="errorapellido2 red-text"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l8">
                                    <input id="email" name="email" type="text" data-error=".errorEmail">
                                    <label for="email">Correo electrónico</label>
                                    <div class="errorEmail red-text"></div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col l8">
                                    <input id="nomusu" name="nomusu" type="text" data-error=".erronomusu">
                                    <label for="nomusu">Nombre de usuario</label>
                                    <div class="erronomusu red-text"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l6" >
                                    <input id="pass" name="pass" type="password" data-error=".errorpass">
                                    <label for="pass">Contraseña</label>
                                    <div class="errorpass red-text"></div>
                                </div>
                                <div class="input-field col l6">
                                    <input id="confpass" name="confpass" type="password" data-error=".errorcofpass">
                                    <label for="confpass">Confirma contraseña</label>
                                    <div class="errorcofpass red-text"></div>
                                </div>
                            </div>
                            <div class="row">
                                <p>
                                    <input type="checkbox"  class="filled-in" id="condiciones" name="condiciones" data-error=".errorCondiciones"/>
                                    <label for="condiciones" class="black-text">Acepto los términos y condiciones. <a href="#modalcondiciones" class="modal-trigger white-text">Leer más. </a></label>

                                </p>
                                <div class="input-field"> 
                                    <div class="errorCondiciones red-text"></div>
                                </div>
                            </div>
                            <div id="modalcondiciones" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                    <h4>Términos y condiciones</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, </p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                </div>
                            </div>
                            <div class="col l3 offset-l9">
                                <button  class="waves-effect waves-light btn z-depth-0" type="submit" >Entrar</button >
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </main>
        <footer class="page-footer">
            <?php include_once("includes/piedepagina.html"); ?> 
        </footer>

    </body>
</html>