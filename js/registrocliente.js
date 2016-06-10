/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    $("#registrocliente").validate({
        rules: {
            nombre: "required",
            apellido1: "required",
            apellido2: "required",
            nomusu: "required",
            pass: {
                required: true,
                min: 10
            },
            confpass: {
                required: true,
                min: 10
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
            nomusu: "Nombre de usuario requerido",
            pass: {
                required: "Contraseña requerida",
                min: "Minimo 10 caracteres"
            },
            confpass: {
                required: "Confirmación de contraseña requerida",
                min: "Minimo 10 caracteres"
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
