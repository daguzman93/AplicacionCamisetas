<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$db = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/parametros.ini');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Camiseta.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Stock.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Imagen.php');
define('DB_HOST', $db['host']);
define('DB_USER', $db['user']);
define('DB_NAME', $db['name']);
define('DB_PASS', $db['pass']);

class GestorBD {

    //Devuelve las camisetas por genero

    public function getCamisetasporGenero($genero) {
        $camisetas = array();
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "SELECT * FROM camiseta WHERE genero=?";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('s', $genero);
            $sentencia->execute();
            $sentencia->bind_result($id, $nombre, $genero, $delantera, $trasera, $precio);
            while ($sentencia->fetch()) {
                $camiseta = new Camiseta($id, $nombre, $genero, $delantera, $trasera, $precio);
                array_push($camisetas, $camiseta);
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $camisetas;
    }

// Devuelve una camiseta por su id
    public function getCamisetaporId($id) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "SELECT * FROM camiseta WHERE id=?";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('i', $id);
            $sentencia->execute();
            $sentencia->bind_result($id, $nombre, $genero, $delantera, $trasera, $precio);
            while ($sentencia->fetch()) {
                $camiseta = new Camiseta($id, $nombre, $genero, $delantera, $trasera, $precio);
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $camiseta;
    }

    public function getStockporCamiseta($camiseta) {
        $array_stock = array();
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "SELECT * FROM stock WHERE camiseta=?";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('i', $camiseta);
            $sentencia->execute();
            $sentencia->bind_result($camiseta, $color, $talla, $cantidad);
            while ($sentencia->fetch()) {
                $stock = new Stock($camiseta, $color, $talla, $cantidad);
                array_push($array_stock, $stock);
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $stock;
    }

    public function getImagenesDibujos() {
        $array_imagenes = array();
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "SELECT * FROM imagen";

        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->execute();
            $sentencia->bind_result($id, $nombre, $ruta, $precio);
            while ($sentencia->fetch()) {
                $imagen = new Imagen($id, $nombre, $ruta, $precio);
                array_push($array_imagenes, $imagen);
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $array_imagenes;
    }

    public function getTextos() {
        $array_textos = array();
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "SELECT * FROM texto";

        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->execute();
            $sentencia->bind_result($id, $nombre, $ruta, $precio);
            while ($sentencia->fetch()) {
                $texto = new Texto($id, $nombre, $ruta, $precio);
                array_push($array_textos, $texto);
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $array_textos;
    }

    public function almacenarDisenador($email) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "INSERT INTO disenador (correo) VALUES(?)";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('s', $email);
            $sentencia->execute();
            $sentencia->close();
        }
        $mysqli->close();
    }

    /*
      Binds variables to prepared statement

      i    corresponding variable has type integer
      d    corresponding variable has type double
      s    corresponding variable has type string
      b    corresponding variable is a blob and will be sent in packets
     */



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
