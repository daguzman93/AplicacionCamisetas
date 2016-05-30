<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $gdb = new GestorBD();
        $gdb->almacenarDisenador($email);
        echo '<h6 class="center-align white-text">Tu correo' . $email . 'ha sido almacenado,'
        . 'en breve nos pondremos en contacto contigo</h6>';
    }
}
