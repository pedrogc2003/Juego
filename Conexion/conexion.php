<?php

class Conexion{
    private static $conexion;

    public static function obtenerConexion() { 
        include_once "datosConexion.php";

        try{
            self::$conexion = new PDO(DSN, USER, PWD);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexion establecida";
        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }

        return self::$conexion;


    }
}

?>