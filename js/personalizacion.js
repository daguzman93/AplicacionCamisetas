/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onload = function () {
    var divcolor;
    var delantera;
    var trasera;
    var canvas = this.__canvas = new fabric.Canvas('tcanvas', {
        hoverCursor: 'pointer',
        selection: true

    });

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
    fabric.Canvas.prototype.customiseControls({
        tl: {
            action: 'rotate',
            cursor: 'pointer'
        },
        tr: {
            action: 'remove',
            cursor: 'pointer'
        },
        bl: {
            action: function (e, target) {
                var elem = document.createElement("img");
                elem.src = target.getSrc();
                elem.width = 370;
                var div = document.createElement('div');
                div.className = 'content';
                div.appendChild(elem);
                document.getElementById('modalimagen').replaceChild(div, document.getElementById('modalimagen').firstChild);
                $('#modalimagen').openModal();
            },
            cursor: 'pointer'
        },
        br: {
            action: 'scale',
            cursor: 'pointer'
        }
    });

    document.getElementById('delantera').onclick = function () {
        if (this.className !== 'active') {
            document.getElementById('area-camiseta').src = this.src;
            $('#delantera').attr('class', 'active');
            $('#trasera').attr('class', '');
            $('#drawingArea').css({
                position: 'absolute',
                top: 110,
                marginLeft: 160
            });
            trasera = JSON.stringify(canvas);
            canvas.clear();
            try {
                if (delantera != undefined) {
                    canvas.loadFromJSON(JSON.parse(delantera), canvas.renderAll.bind(canvas));
                }

            } catch (e) {
                alert(e);
            }
        }
    };
    document.getElementById('trasera').onclick = function () {
        if (this.className !== 'active') {
            document.getElementById('area-camiseta').src = this.src;
            $('#trasera').attr('class', 'active');
            $('#delantera').attr('class', '');
            $('#drawingArea').css({
                position: 'absolute',
                top: 70,
                marginLeft: 155
            });
            delantera = JSON.stringify(canvas);
            canvas.clear();
            try {
                if (trasera != undefined) {
                    canvas.loadFromJSON(JSON.parse(trasera), canvas.renderAll.bind(canvas));
                }

            } catch (e) {
                alert(e);
            }
        }

    };

    $(document).on('click', '#Hombre', function (event) {
        event.preventDefault();
        $.ajax("ajax/MostrarCamisetasPorGenero.php?genero=Hombre", {
            dataType: 'json',
            success: function (data) {
                var content = '';
                for (i = 0; i < data.length; i++) {
                    content += '<div class="col l2"><a href="areaPersonalizacion.php?idc=' + data[i]['id'] + '"><img  class=" images-genero" id="' + data[i]['id'] + '" src="img/fotosMasdeMil/' + data[i]['delantera'] + '"> </a></div>';
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
                    content += '<div class="col l2"><a href="areaPersonalizacion.php?idc=' + data[i]['id'] + '"><img  class=" images-genero" id="' + data[i]['id'] + '" src="img/fotosMasdeMil/' + data[i]['delantera'] + '"> </a></div>';
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
                    content += '<div class="col l2"><a href="areaPersonalizacion.php?idc=' + data[i]['id'] + '"><img  class=" images-genero" id="' + data[i]['id'] + '" src="img/fotosMasdeMil/' + data[i]['delantera'] + '"> </a></div>';
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
                var content = '<div class="col l12"><div class="col l12"><p class="letra-pequena">Selecciona el diseño que más te guste.</p></div></div><div class="col l12">';
                for (i = 0; i < data.length; i++) {
                    content += '<div class="col l2"><img  class="images-dibujos" id="' + data[i]['id'] + '" src="img/fotosMasdeMil/' + data[i]['ruta'] + '"> </div>';
                }
                $('#area-modificable').html(content + '</div>');
            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });
        $('#colores-camiseta').html(divcolor);
        $('.boton-active').attr('class', 'waves-effect waves-light btn z-depth-0');
        $(this).attr('class', 'waves-effect waves-light btn z-depth-0 boton-active');
    });
    $('#sube-imagen').click(function () {
        var content = '<div class="col l12"><div class="col l12"><p class="letra-pequena">Sube tu diseño, un archivo JPG o un archivo PNG sin fondo (max 25MB).</p></div></div>';
        content += '<div class="col l12"><div class="col l10 "><form id="formsubirimg" enctype="multipart/form-data" method="POST" action="#"><div class="row"><div class="file-field input-field col l12"><div class="waves-effect waves-light btn z-depth-0"><span>Examinar</span><input id="img" name="archivo" type="file" data-error=".errorArchivo"></div><div class="file-path-wrapper"><input class="file-path validate" type="text"></div></div><div class="errorArchivo red-text letra-pequena"></div></div>\
 <div class="row"><div class="col l8"><p><input type="checkbox" class="filled-in" id="condiciones" data-error=".errorCondiciones" name="condiciones"/><label for="condiciones" >Acepto las condiciones de uso. <a href="#modalcondiciones" class="modal-trigger">Leer más. </a></label><div class="input-field"><div class="errorCondiciones red-text letra-pequena"></div></div></p></div><div class="col l4"><button id="btn-subir" class="btn waves-effect waves-light z-depth-0" type="submit">Subir imagen</button></div></div></form></div></div>';
        content += '<div id="modalcondiciones" class="modal modal-fixed-footer"><div class="modal-content"><h4>Términos y condiciones</h4><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, </p></div><div class="modal-footer"><a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a></div></div>';
        $('#colores-camiseta').html(divcolor);
        $('#area-modificable').html(content);
        $('.boton-active').attr('class', 'waves-effect waves-light btn z-depth-0');
        $(this).attr('class', 'waves-effect waves-light btn z-depth-0 boton-active');
        $('.modal-trigger').leanModal();
        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param);
        });
        $("#formsubirimg").validate({
            rules: {
                archivo: {
                    required: true,
                    extension: "png|jpg",
                    filesize: 26214400
                },
                condiciones: "required"
            },
            messages: {
                archivo: {
                    required: "No has introducido ningun fichero",
                    extension: "La imagen debe tener extensión jpg o png",
                    filesize: "La imagen no debe de pesar mas de 25MB"

                },
                condiciones: "Acepta los términos y condiciones"
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
        $('#btn-subir').on('click', function (e) {
            if ($("#formsubirimg").valid()) {
                e.preventDefault();
                var form_data = new FormData($('#formsubirimg')[0]);
                var file = $("#img")[0].files[0];
                $.ajax({
                    url: 'ajax/subidaImagen.php',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'POST',
                    success: function (data) {
                        $('#formsubirimg')[0].reset();
                        canvas.clear();
                        fabric.Image.fromURL('upload/' + data, function (oImg) {
                            oImg.set({
                                scaleX: (canvas.width * 0.80) / oImg.width,
                                scaleY: (canvas.width * 0.80) / oImg.width,
                                hasRotatingPoint: false,
                                lockScalingFlip: true
                            });
                            canvas.add(oImg);
                            canvas.centerObject(oImg);
                            canvas.renderAll();
                        });
                    }
                });
            }

        });


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
                divcolor = $('#colores-camiseta').html();
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
        
        $('#check-texto1').on('click',function(e){
            e.preventDefault();
            alert('hola');
            
        });
    });
    
    
    
    $('#elige-producto').click(function () {
        $.ajax("ajax/MostrarModelosHombre.php", {
            dataType: 'json',
            success: function (data) {
                var content = '<div class="col l12"><div class="col l12"><p class="letra-pequena">Selecciona la prenda que deseas</p></div></div><div class="col l12"><div class="col l2"><a id="Hombre" class="active-genero" href="#">HOMBRE</a></div><div class="col l2"><a id="Mujer"  class="genero" href="#">MUJER</a></div><div class="col l2"><a id="Niño" class="genero" href="#">NIÑO</a></div></div><div id="imagenes-camisetas">';
                for (i = 0; i < data.length; i++) {
                    content += '<div class="col l2"><a href="areaPersonalizacion.php?idc=' + data[i]['id'] + '"><img  class=" images-genero" id="' + data[i]['id'] + '" src="img/fotosMasdeMil/' + data[i]['delantera'] + '"> </a></div>';
                }
                $('#area-modificable').html(content);
            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });
        $('#colores-camiseta').html(divcolor);
        $('.boton-active').attr('class', 'waves-effect waves-light btn z-depth-0');
        $(this).attr('class', 'waves-effect waves-light btn z-depth-0 boton-active');
    });
    $(document).on('click', '.images-dibujos', function () {
        canvas.clear();
        fabric.Image.fromURL(this.src, function (oImg) {
            oImg.set({
                scaleX: (canvas.width * 0.80) / oImg.width,
                scaleY: (canvas.width * 0.80) / oImg.width,
                hasRotatingPoint: false,
                lockScalingFlip: true
            });
            canvas.add(oImg);
            canvas.centerObject(oImg);
            canvas.renderAll();
        });
    });
    canvas.observe("object:scaling", function (e) {
        var shape = e.target;
        var minWidth = (canvas.width * 0.30);
        var maxWidth = (canvas.width * 0.80);
        var actualWidth = shape.scaleX * shape.width;
        if (!isNaN(maxWidth) && actualWidth >= maxWidth) {

            shape.set({scaleX: maxWidth / shape.width, scaleY: maxWidth / shape.width});
        }

        if (!isNaN(minWidth) && actualWidth <= minWidth) {
            shape.set({scaleX: minWidth / shape.width, scaleY: minWidth / shape.width});
        }
        LimiteBordes(e);

    });
    canvas.on({
        'object:selected': Controles,
        'object:moving': LimiteBordes,
        'object:rotating': LimiteBordes

    });

    function LimiteBordes(e) {
        var obj = e.target;
        if (obj.getHeight() > obj.canvas.height || obj.getWidth() > obj.canvas.width) {
            obj.setScaleY(obj.originalState.scaleY);
            obj.setScaleX(obj.originalState.scaleX);
        }
        obj.setCoords();
        if (obj.getBoundingRect().top - (obj.cornerSize / 2) < 0 ||
                obj.getBoundingRect().left - (obj.cornerSize / 2) < 0) {
            obj.top = Math.max(obj.top, obj.top - obj.getBoundingRect().top + (obj.cornerSize / 2));
            obj.left = Math.max(obj.left, obj.left - obj.getBoundingRect().left + (obj.cornerSize / 2));
        }
        if (obj.getBoundingRect().top + obj.getBoundingRect().height + obj.cornerSize > obj.canvas.height || obj.getBoundingRect().left + obj.getBoundingRect().width + obj.cornerSize > obj.canvas.width) {

            obj.top = Math.min(obj.top, obj.canvas.height - obj.getBoundingRect().height + obj.top - obj.getBoundingRect().top - obj.cornerSize / 2);
            obj.left = Math.min(obj.left, obj.canvas.width - obj.getBoundingRect().width + obj.left - obj.getBoundingRect().left - obj.cornerSize / 2);
        }
    }
    function Controles(e) {
        var selectedObject = e.target;
        selectedObject.hasRotatingPoint = false;
        selectedObject.customiseCornerIcons({
            settings: {
                borderColor: '#0095ad',
                cornerSize: 30,
                cornerShape: 'circle',
                cornerPadding: 10
            },
            tl: {
                icon: 'img/rotate.png'

            },
            tr: {
                icon: 'img/remove.png'
            },
            bl: {
                icon: 'img/zoom.png'

            },
            br: {
                icon: 'img/resize.png'

            }
        });
        selectedObject.setControlsVisibility({'mt': false, 'mb': false, 'mr': false, 'ml': false});
    }


};


