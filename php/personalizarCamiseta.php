
<?php

session_start();
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Camiseta.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Stock.php';
$gdb = new GestorBD();
$lista = $gdb->getCamisetasporGenero("Hombre");
$camiseta = $lista[0];
$array_colores = $gdb->getColoresCamiseta($camiseta->getId());
$array_tallas = $gdb->getTallasCamiseta($camiseta->getId());

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

usort($array_tallas, "cmp");
$_SESSION['camiseta'] = serialize($camiseta);
$_SESSION['colores'] = $array_colores;
$_SESSION['tallas'] = $array_tallas;
$_SESSION['modelos_hombre'] = serialize($lista);
header("Location: ../areaPersonalizacion.php");


