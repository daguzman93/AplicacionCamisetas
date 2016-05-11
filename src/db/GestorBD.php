<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require ('../logic/Camiseta.php');
$db = parse_ini_file("../../parametros.ini");
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
            $sentencia->bind_result($id, $nombre, $stock, $talla, $color, $genero, $delantera, $trasera, $precio);
            while ($sentencia->fetch()) {
                $camiseta = new Camiseta($id, $nombre, $stock, $talla, $color, $genero, $delantera, $trasera, $precio);
                array_push($camisetas, $camiseta);
                
                
            }
            $sentencia->close();
            
        }
        $mysqli->close();
        return $camisetas;
        /*
          Binds variables to prepared statement

          i    corresponding variable has type integer
          d    corresponding variable has type double
          s    corresponding variable has type string
          b    corresponding variable is a blob and will be sent in packets
         */
    }

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
