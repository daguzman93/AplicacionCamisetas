<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ('../db/GestorBD.php');
$genero = $_GET['genero'];
$gdb = new GestorBD();
$lista = $gdb->getCamisetasporGenero($genero);
print json_encode($lista);
exit;

