/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onload = function () {
    var canvas = this.__canvas = new fabric.Canvas('tcanvas');
    canvas.setHeight(250);
    canvas.setWidth(175);
    var texto = new fabric.Text("Coloca\ntu diseño,\nfoto o\ntexto", {
        fontFamily: ' Hero_propia',
        textAlign: 'center',
        fontSize: 25,
        fill: '#0095ad',
        hasControls: false,
        hasBorders: false,
        selectable: false
    });
    canvas.add(texto);
    canvas.centerObject(texto);
    document.getElementById('delantera').onclick = function () {
        document.getElementById('area-camiseta').src = "img/fotosMasdeMil/camisetas/delanteraMangaCortaHombre.jpg";
        $('#drawingArea').css({
            position: 'absolute',
            top: 110,
            marginLeft: 165
        });
        canvas.setWidth(175);
    };
    document.getElementById('trasera').onclick = function () {
        document.getElementById('area-camiseta').src = "img/fotosMasdeMil/camisetas/traseraMangaCortaHombre.jpg";
        $('#drawingArea').css({
            position: 'absolute',
            top: 70,
            marginLeft: 155

        });
        canvas.setWidth(170);

    };
    $('.red').click(
            function () {
                $('#area-camiseta').css({
                    backgroundColor: 'red'
                });
            });

    $('#elige-producto').click(function () {
        this.src = 'img/elige_tu_producto_activo.png';
        $('#elige-diseno').attr('src', 'img/elige_tu_diseño_inactivo.png');
        $('#sube-imagen').attr('src', 'img/sube_tu_imagen_inactivo.png');
        $('#escribe-texto').attr('src', 'img/escribe_tu_texto_inactivo.png');
    });
    $('#elige-diseno').click(function () {
        this.src = 'img/elige_tu_diseño_activo.png';
        $('#sube-imagen').attr('src', 'img/sube_tu_imagen_inactivo.png');
        $('#escribe-texto').attr('src', 'img/escribe_tu_texto_inactivo.png');
        $('#elige-producto').attr('src', 'img/elige_tu_producto_inactivo.png');

    });
    $('#sube-imagen').click(function () {
        this.src = 'img/sube_tu_imagen_activo.png';
        $('#escribe-texto').attr('src', 'img/escribe_tu_texto_inactivo.png');
        $('#elige-producto').attr('src', 'img/elige_tu_producto_inactivo.png');
        $('#elige-diseno').attr('src', 'img/elige_tu_diseño_inactivo.png');
    });
    $('#escribe-texto').click(function () {
        this.src = 'img/escribe_tu_texto_activo.png';
        $('#elige-producto').attr('src', 'img/elige_tu_producto_inactivo.png');
        $('#elige-diseno').attr('src', 'img/elige_tu_diseño_inactivo.png');
        $('#sube-imagen').attr('src', 'img/sube_tu_imagen_inactivo.png');
    });

    $('#Hombre').click(function (event) {
        event.preventDefault();
        $.ajax("../src/ajax/MostrarCamisetasPorGenero.php?genero=Hombre", {
            dataType: 'json',
            success: function (data) {
                var content = '';
                for (i = 0; i < data.length; i++) {
                    content += '<div class="col l2"><img  class="responsive-img images-genero"  src="img/fotosMasdeMil/' + data[i]['delantera'] + '"> </div>';
                }
                $('#imagenes-camisetas').html(content);
            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });
    });
    $('#Mujer').click(function (event) {
        event.preventDefault();
        $.ajax("../src/ajax/MostrarCamisetasPorGenero.php?genero=Mujer", {
            dataType: 'json',
            success: function (data) {
                var content = '';
                for (i = 0; i < data.length; i++) {
                    content += '<div class="col l2"><img  class="responsive-img images-genero"  src="img/fotosMasdeMil/' + data[i]['delantera'] + '"> </div>';
                }
                $('#imagenes-camisetas').html(content);
            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });
    });
    $('#Niño').click(function (event) {
        event.preventDefault();
        $.ajax("../src/ajax/MostrarCamisetasPorGenero.php?genero=Niño", {
            dataType: 'json',
            success: function (data) {
                var content = '';
                for (i = 0; i < data.length; i++) {
                    content += '<div class="col l2"><img  class="responsive-img images-genero" src="img/fotosMasdeMil/' + data[i]['delantera'] + '"> </div>';
                }
                $('#imagenes-camisetas').html(content);


            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });
    });

    $(document).on('click', '.images-genero', function () {
        $('#area-camiseta').attr('src', this.src);
        $('#delantera').attr('src', this.src);
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