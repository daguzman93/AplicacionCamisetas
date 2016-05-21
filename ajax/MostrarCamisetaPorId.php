<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
$id = $_GET['id'];
$gdb = new GestorBD();
$camiseta = $gdb->getCamisetaporId($id);
print json_encode($camiseta);
exit;
