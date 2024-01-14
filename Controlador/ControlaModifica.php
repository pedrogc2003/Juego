<?php
include_once '../Modelo/CampeonBD.php';

try {
    // Obtener datos del formulario
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nuevoNombre = isset($_POST['nuevoNombre']) ? $_POST['nuevoNombre'] : null;
    $nuevoRol = isset($_POST['nuevoRol']) ? $_POST['nuevoRol'] : null;
    $nuevaDificultad = isset($_POST['nuevaDificultad']) ? $_POST['nuevaDificultad'] : null;
    $nuevaDescripcion = isset($_POST['nuevaDescripcion']) ? $_POST['nuevaDescripcion'] : null;

    // Lógica para actualizar el campeón
    $actualizacionExitosa = CampeonBD::actualizarPorId($id, $nuevoNombre, $nuevoRol, $nuevaDificultad, $nuevaDescripcion);

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
