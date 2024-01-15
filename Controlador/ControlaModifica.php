<!-- Menú de Navegación -->
<div id="menu">
    <!-- Formulario para ir a la página de inserción de campeones -->
    <form action="../Vista/formInsertar.php" method="get">
        <button type="submit">Insertar Campeon</button>
    </form>

    <!-- Formulario para ir a la página de visualización de todos los campeones -->
    <form action="../Vista/formMostrarTodos.php" method="get">
        <button type="submit">Mostrar Campeones</button>
    </form>

    <!-- Formulario para ir a la página de consulta por rol -->
    <form action="../Vista/formMostrarRol.php" method="get">
        <button type="submit">Consultar por Rol</button>
    </form>

    <!-- Formulario para ir a la página de modificación de campeones -->
    <form action="../Vista/formActualizar.php" method="get">
        <button type="submit">Modificar Campeon</button>
    </form>

    <!-- Formulario para ir a la página de eliminación de campeones -->
    <form action="../Vista/formEliminar.php" method="get">
        <button type="submit">Eliminar Campeon</button>
    </form>
</div>

<?php
// Incluir la clase Campeon y manejar la actualización de datos
include_once '../Modelo/CampeonBD.php';

try {
    // Obtener datos del formulario
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nuevoNombre = isset($_POST['nuevoNombre']) ? strtolower($_POST['nuevoNombre']) : null;
    $nuevoRol = isset($_POST['nuevoRol']) ? strtolower($_POST['nuevoRol']) : null;
    $nuevaDificultad = isset($_POST['nuevaDificultad']) ? strtolower($_POST['nuevaDificultad']) : null;
    $nuevaDescripcion = isset($_POST['nuevaDescripcion']) ? strtolower($_POST['nuevaDescripcion']) : null;

    // Lógica para actualizar el campeón
    $actualizacionExitosa = CampeonBD::actualizarPorId($id, $nuevoNombre, $nuevoRol, $nuevaDificultad, $nuevaDescripcion);

    // Mostrar mensaje según el resultado de la actualización
    if ($actualizacionExitosa) {
        echo "Campeón actualizado correctamente.";
    } else {
        echo "Error al actualizar el campeón.";
    }
} catch (Exception $e) {
    // Manejo de errores (puedes personalizar el manejo según tus necesidades)
    echo "Error: " . $e->getMessage();
}
?>
