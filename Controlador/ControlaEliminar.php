<?php
include_once '../Modelo/CampeonBD.php';

try {
    // Obtener el ID del campeón a eliminar desde la solicitud
    $idCampeon = isset($_GET['id']) ? intval($_GET['id']) : null;

    if ($idCampeon) {
        // Intentar eliminar el campeón por ID
        $eliminado = CampeonBD::eliminarPorId($idCampeon);

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
