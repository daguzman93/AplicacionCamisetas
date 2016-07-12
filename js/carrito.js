/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


window.onload = function () {
    $(".borrar-linea").on('click', function (e) {
        e.preventDefault();
        var content = '<div class="modal-content"><p>El producto será eliminado del carrito, ¿esta seguro?</p></div><div class="modal-footer"><a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a><a href="php/eliminarCarrito.php?pos=' + $(this).attr('id') + '" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>';
        $('#modalborracarrito').html(content);
        $('#modalborracarrito').openModal();
    });

    $('.tallas').on('change', function () {
        $.ajax("ajax/ActualizarTalla.php?pos=" + $(this).attr('id') + "&tal=" + $(this).val(), {
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });

    });
    $('.cantidad').on('change', function () {
        $.ajax("ajax/ActualizarCantidad.php?pos=" + $(this).attr('id') + "&cant=" + $(this).val(), {
            dataType: 'json',
            success: function (data) {
                $('#preciolinea'+data['linea']).html(data['prelinea']+" €");
                $('#total').html(data['total']+" €");
            },
            error: function (resp, msg, ex) {
                alert("Error (" + resp.status + "):" + msg);
            }
        });
    });

};