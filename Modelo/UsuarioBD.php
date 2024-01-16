<?php

include 'usuario.php';

class UsuarioBD{
    
    public static function add(Usuario $usuario): bool {
        try {
            // Establecemos la conexión con la base de datos
            include_once '../Conexion/conexion.php';
            $conexion = Conexion::obtenerConexion();
    
            // Verificar si el usuario ya existe
            if (self::usuarioExiste($usuario->getUsuario())) {
                // Usuario ya registrado, devolver false
                return false;
            }
    
            // Obtenemos los valores del usuario
            $nombre = $usuario->getNombre();
            $usuarioNombre = $usuario->getUsuario();
            $password = $usuario->getPassword();
            $email = $usuario->getEmail();
    
            // Hash de la contraseña
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            // Preparamos la consulta SQL
            $sql = "INSERT INTO usuario (nombre, usuario, password, email) VALUES (?, ?, ?, ?)";
    
            $sentencia = $conexion->prepare($sql);
    
            $sentencia->bindParam(1, $nombre, PDO::PARAM_STR);
            $sentencia->bindParam(2, $usuarioNombre, PDO::PARAM_STR);
            $sentencia->bindParam(3, $hashedPassword, PDO::PARAM_STR);
            $sentencia->bindParam(4, $email, PDO::PARAM_STR);
    
            // Ejecutamos la consulta y devolvemos el resultado
            return $sentencia->execute();
        } catch (PDOException $e) {
            // Manejo de errores (puedes personalizar el manejo según tus necesidades)
            throw new Exception("Error al agregar usuario: " . $e->getMessage());
        }
    }
    
    // Función para verificar si un usuario ya existe
    private static function usuarioExiste($usuario): bool {
        include_once '../Conexion/conexion.php';
        $conexion = Conexion::obtenerConexion();
    
        $sql = "SELECT COUNT(*) FROM usuario WHERE usuario = :usuario";
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute(['usuario' => $usuario]);
    
        return $sentencia->fetchColumn() > 0;
    }
    

    public static function autenticar($usuario, $password): bool {
        try {
            // Establecemos la conexión con la base de datos
            include_once '../Conexion/conexion.php';
            $conexion = Conexion::obtenerConexion();
            
            $sql = "SELECT * FROM usuario WHERE usuario = :usuario";
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute(['usuario' => $usuario]);
            $usuarioEncontrado = $sentencia->fetch();
    
            // Verificar si se encontró un usuario
            if ($usuarioEncontrado) {
                // Verificar la contraseña
                return password_verify($password, $usuarioEncontrado['password']);
            }
    
            return false; // Usuario no encontrado
        } catch (PDOException $e) {
            throw new Exception("Error al autenticar usuario: " . $e->getMessage());
        }
    }
    


}

?>