/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onload = function () {
    var canvas = this.__canvas = new fabric.Canvas('tcanvas');
    canvas.setHeight(250);
    canvas.setWidth(170);
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
        document.getElementById('area-camiseta').src = "img/delantera.jpg";
        $('#drawingArea').css({
            position: 'absolute',
            top: 300,
            marginLeft: 165
        });
        canvas.setWidth(170);
    };
    document.getElementById('trasera').onclick = function () {
        document.getElementById('area-camiseta').src = "img/trasera.jpg";
        $('#drawingArea').css({
            position: 'absolute',
            top: 240,
            marginLeft: 155

        });
        canvas.setWidth(170);

    };
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