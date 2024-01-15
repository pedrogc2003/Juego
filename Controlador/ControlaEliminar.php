<!-- Menú de navegación -->
<div id="menu">
    <form action="../Vista/formInsertar.php" method="get">
        <button type="submit">Insertar Campeon</button>
    </form>

    <form action="../Vista/formMostrarTodos.php" method="get">
        <button type="submit">Mostrar Campeones</button>
    </form>

    <form action="../Vista/formMostrarRol.php" method="get">
        <button type="submit">Consultar por Rol</button>
    </form>

    <form action="../Vista/formActualizar.php" method="get">
        <button type="submit">Modificar Campeon</button>
    </form>

    <form action="../Vista/formEliminar.php" method="get">
        <button type="submit">Eliminar Campeon</button>
    </form>
</div>

<?php
// Incluir el archivo del modelo
include_once '../Modelo/CampeonBD.php';

try {
    // Obtener el ID del campeón a eliminar desde la solicitud
    $idCampeon = isset($_GET['id']) ? intval($_GET['id']) : null;

    // Verificar si se proporcionó un ID válido
    if ($idCampeon) {
        // Intentar eliminar el campeón por ID
        $eliminado = CampeonBD::eliminarPorId($idCampeon);

        // Verificar si la eliminación fue exitosa
        if ($eliminado) {
            echo "Campeón eliminado exitosamente.";
        } else {
            echo "No se pudo eliminar el campeón. Verifica el ID proporcionado.";
        }
    } else {
        echo "ID de campeón no proporcionado.";
    }
} catch (Exception $e) {
    // Manejo de errores (puedes personalizar el manejo según tus necesidades)
    echo "Error al eliminar campeón: " . $e->getMessage();
}
?>
