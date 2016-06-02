<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $gdb = new GestorBD();
    $array_colores = $gdb->getColoresCamiseta($id);
    $contenido = '<div class="col l12"><div class="col l12"><p class="letra-pequena">Elige tu color</p></div></div><div class="col l12">';
    foreach ($array_colores as $color) {
        $contenido.=' <div class="col l1"><a class="color btn-floating z-depth-0 ' . $color . '"></a></div>';
    }
    $contenido.='</div></div>';
    echo $contenido;
}

