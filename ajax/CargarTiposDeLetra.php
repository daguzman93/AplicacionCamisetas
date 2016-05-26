<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Texto.php';
$gdb = new GestorBD();
$lista = $gdb->getTextos();

$resultado = '<div class="col l5 offset-l1"><div id="tipo-letra" class="input-field col l12"><select name="tipo-letra" class="browser-default"><option value="" disabled selected>Tipo de letra</option>';
foreach ($lista as $texto) {
    $resultado.=' <option value="' . $texto->getNombre() . '" style="font-family:' . $texto->getNombre() . '">' . $texto->getNombre() . '</option>';
}

$resultado.='</select></div></div>';

echo $resultado;
