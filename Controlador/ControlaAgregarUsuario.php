<div id="menu">
        <form action="../Vista/formAgregarUsuario.php" method="get">
            <button type="submit">Registrse</button>
        </form>
        <form action="../Vista/formIniciarSesion.php" method="get">
            <button type="submit">Iniciar Sesion</button>
        </form>
    </div>
    <br>

<?php
// Incluir el modelo de Usuario y la función add
include_once '../Modelo/UsuarioBD.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos del formulario y convertir a minúsculas
        $nombre = $_POST['nombre'];
        $usuarioNombre = $_POST['usuario'];
        $password = $_POST['password']; // Recuerda realizar hash del password antes de almacenarlo en producción
        $email = $_POST['email'];

        // Crear un objeto Usuario
        $nuevoUsuario = new Usuario();
        $nuevoUsuario->setNombre($nombre);
        $nuevoUsuario->setUsuario($usuarioNombre);
        $nuevoUsuario->setPassword($password);
        $nuevoUsuario->setEmail($email);

        // Llamar a la función add
        if (UsuarioBD::add($nuevoUsuario)) {
            echo "El usuario: ". $usuarioNombre. " a sido registrado con la contraseña: " .$password;
        } else {
            echo "Error al agregar el usuario.";
        }
    }
} catch (Exception $e) {
    // Manejo de errores (puedes personalizar el manejo según tus necesidades)
    echo "Error: " . $e->getMessage();
}
?>
