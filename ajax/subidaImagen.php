<?php

define("UPLOAD_DIR", $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/upload/');
if (!empty($_FILES['archivo'])) {
    $imagen = $_FILES["archivo"];
    if ($imagen["error"] == UPLOAD_ERR_OK) {
        $partes = pathinfo($_FILES['archivo']['name']);
        $nombre = time();
        $success = move_uploaded_file($_FILES['archivo']['tmp_name'], UPLOAD_DIR . $nombre .'.'. $partes['extension']);
        if ($success) {
            echo $nombre.'.'. $partes['extension'];
        }
    }
}  