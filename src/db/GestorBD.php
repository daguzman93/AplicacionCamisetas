<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$db = parse_ini_file("../../parametros.ini");
define('DB_SERVER', mb_convert_encoding($db['DB_SERVER'], "auto", 'UTF-8'));
define('DB_USER', mb_convert_encoding($db['DB_USER'], "auto", 'UTF-8'));
define('DB_NAME', mb_convert_encoding($db['DB_NAME'], "auto", 'UTF-8'));
define('DB_PASS', mb_convert_encoding($db['DB_PASS'], "auto", 'UTF-8'));

class GestorBD {
    

//    function getUsuario($id) {
//        $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
//        $mysqli->set_charset('utf8');
//        if (mysqli_connect_errno()) {
//            printf("Fallo la conexion: %s\n", mysqli_connect_error());
//            exit();
//        }
//        $consulta = "select id, nombre from usuario where id=?";
//        if ($sentencia = $mysqli->prepare($consulta)) {
//            $sentencia->bind_param("i", $id);
//            $sentencia->execute();
//            $resultado = $sentencia->get_result();
//            while ($row = $resultado->fetch_assoc()) {
//                echo 'ID: ' . $row['id'] . '<br>';
//                echo 'Nombre: ' . $row['nombre'] . '<br>';
//            }
//            $sentencia->close();
//        }
//        $mysqli->close();
//    }



}
