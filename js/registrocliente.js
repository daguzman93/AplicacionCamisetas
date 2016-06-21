/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    $('select').material_select();
    $("#registrocliente").validate({
        rules: {
            nombre: "required",
            apellido1: "required",
            apellido2: "required",
            tlfno: {
                required: true,
                digits: true,
                min: 9,
                max: 9

            },
            direccion: "required",
            localidad: "required",
            provincia: "required",
            cp: {
                required: true,
                digits: true,
                min: 5,
                max: 5
            },
            nomusu: "required",
            pass: {
                required: true,
                min: 10

            },
            confpass: {
                required: true,
                equalTo: "#pass"

            },
            email: {
                required: true,
                email: true
            },
            condiciones: "required"
        },
        messages: {
            nombre: "Nombre requerido",
            apellido1: "Primer apellido requerido",
            apellido2: "Segundo apellido requerido",
            tlfno: {
                required: "Teléfono requerido",
                digits: "Campo numérico",
                min: "Teléfono incorrecto",
                max: "Teléfono incorrecto"

            },
            direccion: "Dirección requerida",
            localidad: "Localidad requerida",
            provincia: "Provincia requerida",
            cp: {
                required: "CP requerido",
                digits: "Campo numérico",
                min: "CP incorrecto",
                max: "CP incorrecto"
            },
            nomusu: "Nombre de usuario requerido",
            pass: {
                required: "Contraseña requerida",
                 min: "Mínimo 10 caracteres"

            },
            confpass: {
                required: "Confirmación de contraseña requerida",
                equalTo: "Las contraseñas no coinciden"
            },
            email: {
                required: "Email requerido",
                email: "Introduce un email válido"
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


});
