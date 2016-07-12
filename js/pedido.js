/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    $('select').material_select();
    $("#datospedido").validate({
        rules: {
            nombre: "required",
            apellido1: "required",
            apellido2: "required",
            tlfno: {
                required: true,
                digits: true

            },
            direccion: "required",
            localidad: "required",
            provincia: "required",
            cp: {
                required: true,
                digits: true


            },
            email: {
                required: true,
                email: true
            },
            tipopago: "required",
            envio: "required"

        },
        messages: {
            nombre: "Nombre requerido",
            apellido1: "Primer apellido requerido",
            apellido2: "Segundo apellido requerido",
            tlfno: {
                required: "Teléfono requerido",
                digits: "Campo numérico"


            },
            direccion: "Dirección requerida",
            localidad: "Localidad requerida",
            provincia: "Provincia requerida",
            cp: {
                required: "CP requerido",
                digits: "Campo numérico"

            },
            email: {
                required: "Email requerido",
                email: "Introduce un email válido"
            },
            tipopago: "Tipo de pago requerido",
            envio: "Envio requerido"
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
    $('input:radio[name="envio"]').change(function () {

        $.ajax("ajax/PrecioEnvio.php?env=" + $(this).val(), {
            dataType: 'json',
            success: function (data) {
                $('#celdaenvio').html(data['envio'] + " €");
                $('#celdaIVA').html(data['iva'] + " €");
                $('#celdatotal').html(data['total'] + " €");
                $('#inputtotal').attr('value', data['total']);

            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });

    });

    $(document).on('submit', '#datospedido', function (e) {
        e.preventDefault();
        $.ajax("ajax/PagoPayPal.php", {
            type: "POST",
            dataType: 'json',
            data: $('#datospedido').serialize(),
            success: function (data) {
                $('input[name="amount"]').attr('value', data['precio']);
                $('input[name="first_name"]').attr('value', data['nombre']);
                $('input[name="last_name"]').attr('value', data['apellidos']);
                $('input[name="address1"]').attr('value', data['direccion']);
                $('input[name="city"]').attr('value', data['ciudad']);
                $('input[name="night_phone_a"]').attr('value', data['tlfno']);
                $('input[name="zip"]').attr('value', data['cp']);
                $('#formpaypal').submit();
            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });
    });



});

