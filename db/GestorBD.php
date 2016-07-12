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
include_once ($_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Cliente.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/AplicacionCamisetas/class/Envio.php');
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

    public function getStockporCamiseta($id) {
        $array_stock = array();
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "SELECT * FROM stock WHERE camiseta=?";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('i', $id);
            $sentencia->execute();
            $sentencia->bind_result($camiseta, $color, $talla, $cantidad);
            while ($sentencia->fetch()) {
                $stock = new Stock($camiseta, $color, $talla, $cantidad);
                array_push($array_stock, $stock);
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $array_stock;
    }

    public function getColoresCamiseta($id) {
        $array_colores = array();
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "SELECT color FROM stock WHERE camiseta=? GROUP BY color";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('i', $id);
            $sentencia->execute();
            $sentencia->bind_result($color);
            while ($sentencia->fetch()) {
                array_push($array_colores, $color);
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $array_colores;
    }

    public function getTallasCamiseta($id) {
        $array_tallas = array();
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "SELECT talla FROM stock WHERE camiseta=? GROUP BY talla";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('i', $id);
            $sentencia->execute();
            $sentencia->bind_result($talla);
            while ($sentencia->fetch()) {
                array_push($array_tallas, $talla);
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $array_tallas;
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

    public function existeDisenador($email) {
        $bool = FALSE;
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "SELECT * FROM disenador WHERE correo=?";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('s', $email);
            $sentencia->execute();
            $sentencia->store_result();
            if ($sentencia->num_rows > 0) {
                $bool = TRUE;
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $bool;
    }

    public function almacenarCliente($nombre, $apellidos, $email, $tlfno, $direccion, $localidad, $provincia, $cp, $nomusu, $pass) {
        $rol = 'cliente';
        $estado = 'inactivo';
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }

        $query = "INSERT INTO usuario (nombre,apellidos,correo,telefono, direccion, localidad, provincia, cp) VALUES (?,?,?,?,?,?,?,?)";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('sssisssi', $nombre, $apellidos, $email, $tlfno, $direccion, $localidad, $provincia, $cp);
            $sentencia->execute();
            $sentencia->close();
        }

        $last_id = $mysqli->insert_id;
        $query = "INSERT INTO cliente (id,nombre_usuario,contrasena, rol, estado) VALUES (?,?,?,?,?)";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('issss', $last_id, $nomusu, $pass, $rol, $estado);
            $sentencia->execute();
            $sentencia->close();
        }
        $mysqli->close();
    }

    public function insertarSolititudRegistro($usuario, $fecha, $codigo) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "INSERT INTO solicitud_registro (usuario,fecha,codigo) VALUES (?,?,?)";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('sss', $usuario, $fecha, $codigo);
            $sentencia->execute();
            $sentencia->close();
        }
        $mysqli->close();
    }

    public function existeClienteporNombreUsuario($nomusu) {
        $bool = FALSE;
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "SELECT * FROM cliente WHERE nombre_usuario=?";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('s', $nomusu);
            $sentencia->execute();
            $sentencia->store_result();
            if ($sentencia->num_rows > 0) {
                $bool = TRUE;
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $bool;
    }

    public function getClienteporNomUsuario($nomusu) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "SELECT u.id,nombre,apellidos,correo,telefono, direccion, localidad, provincia, cp,nombre_usuario,contrasena, rol, estado FROM usuario as u JOIN cliente as c WHERE u.Id=c.Id AND c.Nombre_usuario=?";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('s', $nomusu);
            $sentencia->execute();
            $sentencia->bind_result($id, $nombre, $apellidos, $correo, $telefono, $direccion, $localidad, $provincia, $cp, $nomUsuario, $pass, $rol, $estado);
            while ($sentencia->fetch()) {
                $cliente = new Cliente($id, $nombre, $apellidos, $correo, $telefono, $direccion, $localidad, $provincia, $cp, $nomUsuario, $pass, $rol, $estado);
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $cliente;
    }

    public function getImagenDibujoPorID($id) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "SELECT * FROM imagen WHERE id=?";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('i', $id);
            $sentencia->execute();
            $sentencia->bind_result($id, $nombre, $ruta, $precio);
            while ($sentencia->fetch()) {
                $imagen = new Imagen($id, $nombre, $ruta, $precio);
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $imagen;
    }

    public function getIdUsuarioporSolicitud($codigo) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "SELECT usuario FROM solicitud_registro WHERE codigo=?";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('i', $codigo);
            $sentencia->execute();
            $sentencia->bind_result($usuario);
            while ($sentencia->fetch()) {
                $result = $usuario;
            }
            $sentencia->close();
        }
        $mysqli->close();

        return $result;
    }

    public function EstadoActivoCliente($id) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "UPDATE cliente SET estado='activo' WHERE id=?";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('i', $id);
            $sentencia->execute();
            $sentencia->close();
        }
        $mysqli->close();
    }

    public function getEstadoCliente($id) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = " SELECT estado FROM cliente WHERE id=?";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('i', $id);
            $sentencia->execute();
            $sentencia->bind_result($estado);
            while ($sentencia->fetch()) {
                $result = $estado;
            }
            $sentencia->close();
        }
        $mysqli->close();

        return $result;
    }

    public function getEnvios() {
        $array_envios = array();
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = " SELECT * FROM envio";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->execute();
            $sentencia->bind_result($id, $nombre, $precio);
            while ($sentencia->fetch()) {
                $envio = new Envio($id, $nombre, $precio);
                array_push($array_envios, $envio);
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $array_envios;
    }

    public function getPrecioEnvioporNombre($nombre) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = " SELECT precio FROM envio where nombre=?";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('s', $nombre);
            $sentencia->execute();
            $sentencia->bind_result($precio);
            while ($sentencia->fetch()) {
                $result = $precio;
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $result;
    }

    public function getEnvioporNombre($nombre) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = " SELECT * FROM envio where nombre=?";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('s', $nombre);
            $sentencia->execute();
            $sentencia->bind_result($id, $nombre, $precio);
            while ($sentencia->fetch()) {
                $envio = new Envio($id, $nombre, $precio);
            }
            $sentencia->close();
        }
        $mysqli->close();
        return $envio;
    }

    public function insertarUsuario($nombre, $apellidos, $email, $tlfno, $direccion, $localidad, $provincia, $cp) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }

        $query = "INSERT INTO usuario (nombre,apellidos,correo,telefono, direccion, localidad, provincia, cp) VALUES (?,?,?,?,?,?,?,?)";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('sssisssi', $nombre, $apellidos, $email, $tlfno, $direccion, $localidad, $provincia, $cp);
            $sentencia->execute();
            $sentencia->close();
        }
        $last_id = $mysqli->insert_id;
        $mysqli->close();
        return $last_id;
    }

    public function insertarPedido($fecha, $precio, $dirección, $pago, $estado, $envio, $usuario) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "INSERT INTO pedido (fecha,precio,direccion,pago, estado, envio, usuario) VALUES (?,?,?,?,?,?,?)";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('sdsssii', $fecha, $precio, $dirección, $pago, $estado, $envio, $usuario);
            $sentencia->execute();
            $sentencia->close();
        }
        $last_id = $mysqli->insert_id;
        $mysqli->close();
        return $last_id;
    }

    public function insertarLineaPedido($cantidad, $talla, $precio, $camiseta,$diseno, $pedido) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "INSERT INTO linea_pedido (cantidad, talla, precio, camiseta,diseno, pedido) VALUES (?,?,?,?,?,?)";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('isdiii', $cantidad, $talla, $precio, $camiseta,$diseno,$pedido);
            $sentencia->execute();
            $sentencia->close();
        }
        $mysqli->close();
    }
    
    public function insertarCamisetaDefinida($id, $diseno, $color){
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "INSERT INTO camiseta_definida (id, diseno, color) VALUES (?,?,?)";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('iis', $id, $diseno, $color);
            $sentencia->execute();
            $sentencia->close();
        }
        $mysqli->close();
    }
    
    public function insertarDiseno($nombre,$categoria, $parte_delantera,$parte_trasera,$precio){
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset('utf8');
        if (mysqli_connect_errno()) {
            printf("Fallo la conexion: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "INSERT INTO diseno (nombre,categoria, parte_delantera,parte_trasera,precio) VALUES (?,?,?,?,?)";
        if ($sentencia = $mysqli->prepare($query)) {
            $sentencia->bind_param('ssssd', $nombre,$categoria, $parte_delantera,$parte_trasera,$precio);
            $sentencia->execute();
            $sentencia->close();
        }
        $last_id = $mysqli->insert_id;
        $mysqli->close();
        return $last_id;
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
