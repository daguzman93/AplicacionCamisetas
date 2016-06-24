<?php
if (isset($_GET['errores'])) {
    $aux = stripcslashes($_GET['errores']);
    $errores = unserialize($aux);
}
?>
<!DOCTYPE html>
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

    </head>
    <body>
        <header>
            <link rel="shortcut icon" href="favicon.ico">
            <?php include_once("includes/cabecera.html"); ?>   
        </header>

        <main>
            <div class="container ">
                <h5 class="center-align">Inicia sesión o crea una nueva cuenta</h5> 
                <div class="row">
                    <div class="col l5 offset-l1">
                        <h5 c>Nueva cuenta</h5> 
                        <p>Al crear una cuenta en nuestra tienda, podrás realizar el proceso
                            de compra más rápidamente.</p>
                        <p>Aviso: Cuando te hayas registrado recibirás un correo electrónico
                            que deberás confirmar. Si no lo recibes, mira que no se haya
                            quedado en la bandeja de spam.</p>
                        <div class="col l6 offset-l6">
                            <a id="elige-producto" class="waves-effect waves-light btn z-depth-0" href="registro.php">Crear una cuenta</a>
                        </div>

                    </div>
                    <div class="col l5 offset-l1">
                        <h5 >Si ya estás registrado</h5> 
                        <p>Accede si ya tienes una cuenta.</p>
                        <form id="formlogin" class="col l11 offset-l1" method="POST" action="php/iniciosesion.php">
                            <?php if ((isset($errores)) && (count($errores) > 0)) : ?>
                                <div class="row">
                                    <div class="input-field col l8">
                                        <?php for ($i = 0; $i < count($errores); $i++) : ?>
                                            <p class=" red-text"> <?= $errores[$i] ?> </p>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="input-field col l8">
                                    <input id="usuario" name="usuario" type="text" data-error=".errorusuario">
                                    <label for="usuario">Usuario</label>
                                    <div class="errorusuario red-text"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l8">
                                    <input id="pass" name="pass" type="password" data-error=".errorpass" >
                                    <label for="pass">Contraseña</label>
                                    <div class="errorpass red-text"></div>
                                </div>
                            </div>
                            <div class="col l4 offset-l4"> 
                                <button type="submit" class="waves-effect waves-light btn z-depth-0">Entrar</button>
                            </div>
                        </form>
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
<script type="text/javascript">
    $("#formlogin").validate({
        rules: {
            usuario: "required",
            pass: "required"
        },
        messages: {
            usuario: "Email requerido",
            pass: "Contraseña requerida"
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error);
            } else {
                error.insertAfter(element);
            }
        }

    });
</script>