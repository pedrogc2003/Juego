<?php
// Incluimos la clase Campeon
include_once 'Campeon.php';

// Clase que realiza operaciones con la base de datos para la entidad Campeon
class CampeonBD {

    // Función para insertar un nuevo campeón en la base de datos
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

    // Función para obtener todos los campeones de la base de datos
    public static function mostrarTodos() {
        // Establecemos la conexión con la base de datos
        include_once '../Conexion/conexion.php';
        $conexion = Conexion::obtenerConexion();

        // Consulta SQL para obtener todos los campeones
        $sql = "SELECT * FROM campeon";
        $sentencia = $conexion->prepare($sql);

        // Configuramos el modo de fetch para obtener objetos de la clase Campeon
        $sentencia->setFetchMode(PDO::FETCH_CLASS, "Campeon");
        $sentencia->execute();

        return $sentencia->fetchAll();
    }

    // Función para buscar campeones por rol
    public static function buscarPorRol($rol) {
        try {
            // Establecemos la conexión con la base de datos
            include_once '../Conexion/conexion.php';
            $conexion = Conexion::obtenerConexion();

            // Consulta SQL para buscar campeones por rol
            $sql = "SELECT * FROM campeon WHERE rol = :rol";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':rol', $rol, PDO::PARAM_STR);
            $sentencia->setFetchMode(PDO::FETCH_CLASS, "Campeon");
            $sentencia->execute();

            return $sentencia->fetchAll();
        } catch (PDOException $e) {
            // Manejo de errores (puedes personalizar el manejo según tus necesidades)
            throw new Exception("Error al buscar campeones por rol: " . $e->getMessage());
        }
    }

    // Función para eliminar un campeón por su ID
    public static function eliminarPorId($id) {
        try {
            // Establecemos la conexión con la base de datos
            include_once '../Conexion/conexion.php';
            $conexion = Conexion::obtenerConexion();

            // Consulta SQL para eliminar el campeón por ID
            $sql = "DELETE FROM campeon WHERE id = :id";
            $sentencia = $conexion->prepare($sql);

            // Bind de parámetros
            $sentencia->bindParam(':id', $id, PDO::PARAM_INT);

            // Ejecutamos la consulta
            $sentencia->execute();

            // Devolvemos true si la eliminación fue exitosa
            return true;
        } catch (PDOException $e) {
            // Manejo de errores (puedes personalizar el manejo según tus necesidades)
            throw new Exception("Error al eliminar campeón: " . $e->getMessage());
        }
    }

    // Función para actualizar un campeón por su ID
    public static function actualizarPorId($id, $nuevoNombre, $nuevoRol, $nuevaDificultad, $nuevaDescripcion) {
        try {
            // Establecemos la conexión con la base de datos
            include_once '../Conexion/conexion.php';
            $conexion = Conexion::obtenerConexion();

            // Consulta SQL para actualizar el campeón por ID
            $sql = "UPDATE campeon SET nombre = ?, rol = ?, dificultad = ?, descripcion = ? WHERE id = ?";
            $sentencia = $conexion->prepare($sql);

            // Bind de parámetros
            $sentencia->bindParam(1, $nuevoNombre, PDO::PARAM_STR);
            $sentencia->bindParam(2, $nuevoRol, PDO::PARAM_STR);
            $sentencia->bindParam(3, $nuevaDificultad, PDO::PARAM_STR);
            $sentencia->bindParam(4, $nuevaDescripcion, PDO::PARAM_STR);
            $sentencia->bindParam(5, $id, PDO::PARAM_INT);

            // Ejecutamos la consulta
            $sentencia->execute();

            // Devolvemos true si la actualización fue exitosa
            return true;
        } catch (PDOException $e) {
            // Manejo de errores (puedes personalizar el manejo según tus necesidades)
            throw new Exception("Error al actualizar campeón: " . $e->getMessage());
        }
    }
}
?>
