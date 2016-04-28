<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link type="text/css" rel="stylesheet" href="css/estilo.css"/>
        <link type="text/css" rel="stylesheet" href="css/personalizacion.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>MAS DE MIL</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.5.0/fabric.min.js"></script>
        <script type="text/javascript" src="js/principal.js"></script>

    </head>
    <body>
        <header>
            <?php include("./cabecera.html"); ?>   
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col l1">
                        <p>
                            Tu lo diseñas
                        </p>
                        <img id="delantera" class="responsive-img"  src="img/delantera.jpg">
                        <p>delantera</p>
                        <img  class="responsive-img"  src="img/trasera.jpg">
                        <p>trasera</p>
                    </div>
                    <div class="col l5">
                        <img  class="responsive-img"  src="img/delantera.jpg">

                        <div id="drawingArea">					
                            <canvas id="tcanvas" ></canvas>

                        </div>

                        <script>
                            var canvas = this.__canvas = new fabric.Canvas('tcanvas');
                            canvas.setHeight(250);
                            canvas.setWidth(170);
                            var img = new Image();
                            img.src = 'img/disenoEjemplo.png';
                            //var imgElement = document.getElementById('diseno');
                            var imgInstance = new fabric.Image(img, {
                                resizeType: 'hermite',
                                scaleX: 0.05,
                                scaleY: 0.05,

                            });
                            canvas.add(imgInstance);
                        </script>
                    </div>
                    <div class="col l6">


                    </div>
                </div>
            </div>
        </main>
        <footer class="page-footer">
            <?php include("./piedepagina.html"); ?> 
        </footer>

    </body>
</html>    