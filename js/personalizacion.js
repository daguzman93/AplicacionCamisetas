/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onload = function () {
    var canvas = this.__canvas = new fabric.Canvas('tcanvas');
    canvas.setHeight(250);
    canvas.setWidth(175);

    var textoini = new fabric.Text("Coloca\ntu diseño,\nfoto o\ntexto", {
        fontFamily: ' Hero_propia',
        textAlign: 'center',
        fontSize: 25,
        fill: '#0095ad',
        hasControls: false,
        hasBorders: false,
        selectable: false
    });
    canvas.add(textoini);
    canvas.centerObject(textoini);
    document.getElementById('delantera').onclick = function () {
        document.getElementById('area-camiseta').src = this.src;
        $('#drawingArea').css({
            position: 'absolute',
            top: 110,
            marginLeft: 160
        });
        canvas.setWidth(175);
    };
    document.getElementById('trasera').onclick = function () {
        document.getElementById('area-camiseta').src = this.src;
        $('#drawingArea').css({
            position: 'absolute',
            top: 70,
            marginLeft: 155

        });
        canvas.setWidth(170);

    };

    $(document).on('click', '#Hombre', function (event) {
        event.preventDefault();
        $.ajax("ajax/MostrarCamisetasPorGenero.php?genero=Hombre", {
            dataType: 'json',
            success: function (data) {
                var content = '';
                for (i = 0; i < data.length; i++) {
                    content += '<div class="col l2"><img  class="responsive-img images-genero" id="' + data[i]['id'] + '" src="img/fotosMasdeMil/' + data[i]['delantera'] + '"> </div>';
                }
                $('#imagenes-camisetas').html(content);

            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });
        $('.active-genero').attr('class', 'genero');
        $(this).attr('class', 'active-genero');
    });
    $(document).on('click', '#Mujer', function (event) {
        event.preventDefault();

        $.ajax("ajax/MostrarCamisetasPorGenero.php?genero=Mujer", {
            dataType: 'json',
            success: function (data) {
                var content = '';
                for (i = 0; i < data.length; i++) {
                    content += '<div class="col l2"><img  class="responsive-img images-genero" id="' + data[i]['id'] + '" src="img/fotosMasdeMil/' + data[i]['delantera'] + '"> </div>';
                }
                $('#imagenes-camisetas').html(content);

            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });
        $('.active-genero').attr('class', 'genero');
        $(this).attr('class', 'active-genero');
    });
    $(document).on('click', '#Niño', function (event) {
        event.preventDefault();
        $.ajax("ajax/MostrarCamisetasPorGenero.php?genero=Niño", {
            dataType: 'json',
            success: function (data) {
                var content = '';
                for (i = 0; i < data.length; i++) {
                    content += '<div class="col l2"><img  class="responsive-img images-genero" id="' + data[i]['id'] + '" src="img/fotosMasdeMil/' + data[i]['delantera'] + '"> </div>';
                }
                $('#imagenes-camisetas').html(content);


            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });
        $('.active-genero').attr('class', 'genero');
        $(this).attr('class', 'active-genero');
    });
    $('#elige-diseno').click(function () {
        $.ajax("ajax/MostrarImagenesDibujos.php", {
            dataType: 'json',
            success: function (data) {
                var content = '<div class="col l12"><div class="col l12"><p class="letra-pequena">Selecciona el diseño que más te guste. Recuerda que puedes combinar varios</p></div></div><div class="col l12">';
                for (i = 0; i < data.length; i++) {
                    content += '<div class="col l2"><img  class="responsive-img images-dibujos" id="' + data[i]['id'] + '" src="img/fotosMasdeMil/' + data[i]['ruta'] + '"> </div>';
                }
                $('#area-modificable').html(content + '</div>');


            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });
        $('.boton-active').attr('class', 'waves-effect waves-light btn z-depth-0');
        $(this).attr('class', 'waves-effect waves-light btn z-depth-0 boton-active');

    });

    $('#sube-imagen').click(function () {
        var content = '<div class="col l12"><div class="col l12"><p class="letra-pequena">Sube tu diseño, ya sea una fotografía, un archivo JPG o un archivo PNG sin fondo.</p></div></div>';
        content += '<div class="col l12"><div class="col l8"><form action="#"><div class="file-field input-field"><div class="waves-effect waves-light btn z-depth-0"><span>Examinar</span><input type="file" multiple></div><div class="file-path-wrapper"><input class="file-path validate" type="text" ></div></div><p><input type="checkbox" class="filled-in" id="filled-in-box"/><label for="filled-in-box">Acepto las condiciones de uso. Leer más.</label></p></form></div><div class="col l4"><p>Peso máximo 25MB</p></div></div>';

        $('#area-modificable').html(content);
        $('.boton-active').attr('class', 'waves-effect waves-light btn z-depth-0');
        $(this).attr('class', 'waves-effect waves-light btn z-depth-0 boton-active');
    });
    $('#escribe-texto').click(function () {

        $.ajax("ajax/CargarTiposDeLetra.php", {
            dataType: 'html',
            success: function (data) {
                var content = '<div class="col l12"><div class="col l12"><p class="letra-pequena">Añade el texto que quieras, al tamaño que quieras y donde desees.</p></div></div>';
                content += '<div class="col l12"><div class="col l1"><p>Texto</p></div><div class="col l1 offset-l3"><p>Color</p></div><div class="col l1 "><p>OK</p></div><div class="col l2 offset-l1"><p>Justificación</p></div><div class="col l1"><a id="alineacion-izq" class="btn z-depth-0 alineacion-txt"><i class="material-icons">format_align_left</i></a></div><div class="col l1"><a id="alineacion-central" class="btn z-depth-0 alineacion-txt"><i class="material-icons">format_align_center</i></a></div><div class="col l1"><a id="alineacion-drcha" class="btn z-depth-0 alineacion-txt"><i class="material-icons">format_align_right</i></a></div></div>\
 <div class="col l12"><form action="#"><div class="row"><div class="input-field col l4"><input id="texto1" type="text" class="validate textos"></div><div class="col l1"><select id="colortexto1" name="colorpicker"><option value="#ffffff">White</option><option value="#7bd148">Green</option><option value="#5484ed">Bold blue</option><option value="#a4bdfc">Blue</option><option value="#46d6db">Turquoise</option><option value="#7ae7bf">Light green</option><option value="#51b749">Bold green</option><option value="#fbd75b">Yellow</option><option value="#ffb878">Orange</option><option value="#ff887c">Red</option><option value="#dc2127">Bold red</option><option value="#dbadff">Purple</option><option value="#e1e1e1">Gray</option></select></div><div class="col l1"><a id="check-texto1" class="waves-effect waves-light btn z-depth-0" href="#"><i class="material-icons">check</i></a></div></div>\
<div class="row"><div class="input-field col l4"><input id="texto2" type="text" class="validate textos"></div><div class="col l1"><select id="colortexto2" name="colorpicker"><option value="#ffffff">White</option><option value="#7bd148">Green</option><option value="#5484ed">Bold blue</option><option value="#a4bdfc">Blue</option><option value="#46d6db">Turquoise</option><option value="#7ae7bf">Light green</option><option value="#51b749">Bold green</option><option value="#fbd75b">Yellow</option><option value="#ffb878">Orange</option><option value="#ff887c">Red</option><option value="#dc2127">Bold red</option><option value="#dbadff">Purple</option><option value="#e1e1e1">Gray</option></select></div><div class="col l1"><a id="check-texto2" class="waves-effect waves-light btn z-depth-0" href="#"><i class="material-icons">check</i></a></div>';
                content += data + '</div><div class="row"><div class="input-field col l4"><input id="texto3" type="text" class="validate textos"></div><div class="col l1"><select id="colortexto3" name="colorpicker"><option value="#ffffff">White</option><option value="#7bd148">Green</option><option value="#5484ed">Bold blue</option><option value="#a4bdfc">Blue</option><option value="#46d6db">Turquoise</option><option value="#7ae7bf">Light green</option><option value="#51b749">Bold green</option><option value="#fbd75b">Yellow</option><option value="#ffb878">Orange</option><option value="#ff887c">Red</option><option value="#dc2127">Bold red</option><option value="#dbadff">Purple</option><option value="#e1e1e1">Gray</option></select></div><div class="col l1"><a id="check-texto3" class="waves-effect waves-light btn z-depth-0" href="#"><i class="material-icons">check</i></a></div></div>\
<div class="row"><div class="input-field col l4"><input id="texto4" type="text" class="validate textos"></div><div class="col l1"><select id="colortexto4" name="colorpicker"><option value="#ffffff">White</option><option value="#7bd148">Green</option><option value="#5484ed">Bold blue</option><option value="#a4bdfc">Blue</option><option value="#46d6db">Turquoise</option><option value="#7ae7bf">Light green</option><option value="#51b749">Bold green</option><option value="#fbd75b">Yellow</option><option value="#ffb878">Orange</option><option value="#ff887c">Red</option><option value="#dc2127">Bold red</option><option value="#dbadff">Purple</option><option value="#e1e1e1">Gray</option></select></div><div class="col l1"><a id="check-texto4" class="waves-effect waves-light btn z-depth-0" href="#"><i class="material-icons">check</i></a></div></div></form></div></div>';
                $('#area-modificable').html(content);
                $('#colores-camiseta').html('');
                $('select[name="tipo-letra"]').material_select();
                $('select[name="colorpicker"]').simplecolorpicker({picker: true});


            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });

        $('.boton-active').attr('class', 'waves-effect waves-light btn z-depth-0');
        $(this).attr('class', 'waves-effect waves-light btn z-depth-0 boton-active');

    });
    $('#elige-producto').click(function () {
        $.ajax("ajax/MostrarModelosHombre.php", {
            dataType: 'json',
            success: function (data) {
                var content = '<div class="col l12"><div class="col l12"><p class="letra-pequena">Selecciona la prenda que deseas</p></div></div><div class="col l12"><div class="col l2"><a id="Hombre" class="active-genero" href="#">HOMBRE</a></div><div class="col l2"><a id="Mujer"  class="genero" href="#">MUJER</a></div><div class="col l2"><a id="Niño" class="genero" href="#">NIÑO</a></div></div><div id="imagenes-camisetas">';
                for (i = 0; i < data.length; i++) {
                    content += '<div class="col l2"><img  class="responsive-img images-genero" id="' + data[i]['id'] + '" src="img/fotosMasdeMil/' + data[i]['delantera'] + '"> </div>';
                }
                $('#area-modificable').html(content);

            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });
        $('.boton-active').attr('class', 'waves-effect waves-light btn z-depth-0');
        $(this).attr('class', 'waves-effect waves-light btn z-depth-0 boton-active');
    });


    $(document).on('click', '.images-genero', function () {
        $('#area-camiseta').attr('src', this.src);
        $('#delantera').attr('src', this.src);
        $.ajax("ajax/MostrarCamisetaPorId.php?id=" + this.id, {
            dataType: 'json',
            success: function (data) {
                $('#trasera').attr('src', 'img/fotosMasdeMil/' + data['trasera']);
                $('#precio').html(data['precio'] + ' €');
            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });
    });
    $(document).on('click', '.images-dibujos', function () {
        canvas.remove(textoini);
        fabric.Image.fromURL(this.src, function (oImg) {
            oImg.set({
                maxWidth: canvas.width,
                maxHeight: canvas.height
            });
            canvas.add(oImg);
        });
    });




};
//                            var img = new Image();
//                            img.src = 'img/disenoEjemplo.png';
//                            //var imgElement = document.getElementById('diseno');
//                            var imgInstance = new fabric.Image(img, {
//                                resizeType: 'hermite',
//                                scaleX: 0.05,
//                                scaleY: 0.05
//
//                            });
//                            canvas.add(imgInstance);