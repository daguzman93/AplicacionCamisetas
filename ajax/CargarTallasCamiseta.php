<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';

function cmp($a, $b) {
    $sizes = array(
        "XXS" => 0,
        "XS" => 1,
        "S" => 2,
        "M" => 3,
        "L" => 4,
        "XL" => 5,
        "XXL" => 6
    );
    $asize = $sizes[$a];
    $bsize = $sizes[$b];
    if ($asize == $bsize) {
        return 0;
    }
    return ($asize > $bsize) ? 1 : -1;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $gdb = new GestorBD();
    $array_tallas = $gdb->getTallasCamiseta($id);
    usort($array_tallas, "cmp");
    $contenido = '<div class="col l12"><div class="col l12"><p class="letra-pequena">Elige tu talla</p></div></div><div class="col l12">';
    foreach ($array_tallas as $talla) {
        $contenido.=' <div class="col l1"><a class="color btn-floating z-depth-0 white">' . $talla . '</a></div>';
    }
    $contenido.='</div></div>';
    echo $contenido;
}