<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/db/GestorBD.php';
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $gdb = new GestorBD();
    $camiseta = $gdb->getCamisetaporId($id);
    $_SESSION['camiseta'] = serialize($camiseta);
    print json_encode($camiseta);
    exit;
}

