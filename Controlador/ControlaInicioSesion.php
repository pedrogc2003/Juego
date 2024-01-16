<!-- ControlaLogin.php -->
<div id="menu">
    <form action="../Vista/formAgregarUsuario.php" method="get">
        <button type="submit">Registrarse</button>
    </form>
    <form action="../Vista/formIniciarSesion.php" method="get">
        <button type="submit">Iniciar Sesión</button>
    </form>
</div>
<br>

<?php
include_once '../Modelo/UsuarioBD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    try {
        // Verificar la autenticación del usuario
        $autenticado = UsuarioBD::autenticar($usuario, $password);

        if ($autenticado) {
            echo "Inicio de sesión exitoso. ¡Bienvenido!";
            // Bloque de menú después de un inicio de sesión exitoso
            echo '<div id="menu">';
            echo '<form action="../Vista/formInsertar.php" method="get">';
            echo '<button type="submit">Insertar Campeón</button>';
            echo '</form>';

            echo '<form action="../Vista/formMostrarTodos.php" method="get">';
            echo '<button type="submit">Mostrar Campeones</button>';
            echo '</form>';

            echo '<form action="../Vista/formMostrarRol.php" method="get">';
            echo '<button type="submit">Consultar por Rol</button>';
            echo '</form>';

            echo '<form action="../Vista/formActualizar.php" method="get">';
            echo '<button type="submit">Modificar Campeón</button>';
            echo '</form>';

            echo '<form action="../Vista/formEliminar.php" method="get">';
            echo '<button type="submit">Eliminar Campeón</button>';
            echo '</form>';
            echo '</div>';
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
