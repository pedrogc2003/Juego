<?php
include_once 'Campeon.php';

class CampeonBD{

    // Funcion para insertar
    public static function add(Campeon $c): bool {
        $result = false;

        // Establecemos la conexión con la base de datos
        include_once '../Conexion/conexion.php';
        $conexion = Conexion::obtenerConexion();

        // Obtenemos los valores del campeón
        $nombre = $c->getNombre();
        $rol = $c->getRol();
        $dificultad = $c->getDificultad();
        $descripcion = $c->getDescripcion();

        // Preparamos la consulta SQL
        $sql = "INSERT INTO campeon (nombre, rol, dificultad, descripcion) VALUES (?, ?, ?, ?)";

        $sentencia = $conexion->prepare($sql);

        $sentencia->bindParam(1, $nombre, PDO::PARAM_STR);
        $sentencia->bindParam(2, $rol, PDO::PARAM_STR);
        $sentencia->bindParam(3, $dificultad, PDO::PARAM_STR);
        $sentencia->bindParam(4, $descripcion, PDO::PARAM_STR);

        $result = $sentencia->execute();

        return $result;
    }

    public static function mostrarTodos(){
        // Establecemos la conexión con la base de datos
        include_once '../Conexion/conexion.php';
        $conexion = Conexion::obtenerConexion();

        $sql = "SELECT * FROM campeon";
        $sentencia = $conexion->prepare($sql);

        $sentencia-> setFetchMode(PDO::FETCH_CLASS,"Campeon");
        $sentencia->execute();

        return $sentencia->fetchAll();
    }

}

?>