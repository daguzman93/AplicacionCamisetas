<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Carrito.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/CamisetaDefinida.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Camiseta.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Diseno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/LineaPedido.php';
session_start();
define('UPLOAD_DIR', '../img/');
if (isset($_SESSION['carrito'])) {
    $delantera = $_POST['delantera'];
    $trasera = $_POST['trasera'];
    $talla = $_POST['talla'];
    $diseno = new Diseno(0, "Diseño personalizado", "Personalizados", $delantera, $trasera, 0);
    $camiseta = $_SESSION['camiseta'];
    $color = $_POST['color'];
//    $img = $_POST['img'];
//    $img = str_replace('data:image/png;base64,', '', $img);
//    $img = str_replace(' ', '+', $img);
//    $data = base64_decode($img);
//    $id = uniqid();
//    $file = UPLOAD_DIR . $id . '.png';
//    $success = file_put_contents($file, $data);
//    $dest = imagecreatefromjpeg('../img/' + $camiseta->getDelantera());
//    $src = imagecreatefrompng('../img/' + $id);
//    imagecopyresampled($dest, $src, 0, 0, 0, 0, 50, 50, 100);
//    imagepng($dest,  UPLOAD_DIR.'image.png');
    $camsetadef = new CamisetaDefinida($camiseta->getID(), $diseno, $color);
    $linea = new LineaPedido("", 1, $talla, $camiseta->getPrecio(), $camsetadef, "");
    $carrito = unserialize($_SESSION['carrito']);
    $carrito->agregarProducto($linea);
    $_SESSION['carrito'] = serialize($carrito);
} else {
    $delantera = $_POST['delantera'];
    $trasera = $_POST['trasera'];
    $talla = $_POST['talla'];
    $diseno = new Diseno(0, "Diseño personalizado", "Personalizados", $delantera, $trasera, 0);
    $camiseta = $_SESSION['camiseta'];
    $color = $_POST['color'];
//    $img = $_POST['img'];
//    $img = str_replace('data:image/png;base64,', '', $img);
//    $img = str_replace(' ', '+', $img);
//    $data = base64_decode($img);
//    $id = uniqid();
//    $file = UPLOAD_DIR . $id . '.png';
//    $success = file_put_contents($file, $data);
//    $dest = imagecreatefromjpeg('../img/' + $camiseta->getDelantera());
//    $src = imagecreatefrompng('../img/' + $id);
//    imagecopyresampled($dest, $src, 0, 0, 0, 0, 50, 50, 100);
//    imagepng($dest,  UPLOAD_DIR.'image.png');
    $camsetadef = new CamisetaDefinida($camiseta->getID(), $diseno, $color);
    $linea = new LineaPedido("", 1, $talla, $camiseta->getPrecio(), $camsetadef, "");
    $carrito = new Carrito();
    $carrito->agregarProducto($linea);
    $_SESSION['carrito'] = serialize($carrito);
}
