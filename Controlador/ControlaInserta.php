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
// Manejo de la inserción de nuevos campeones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Incluir la clase Campeon y la función add
    include_once '../Modelo/CampeonBD.php';

    // Obtener los datos del formulario y convertir a minúsculas
    $nombre = strtolower($_POST['nombre']);
    $rol = strtolower($_POST['rol']);
    $dificultad = strtolower($_POST['dificultad']);
    $descripcion = strtolower($_POST['descripcion']);

    // Crear un objeto Campeon
    $nuevoCampeon = new Campeon();
    $nuevoCampeon->setNombre($nombre);
    $nuevoCampeon->setRol($rol);
    $nuevoCampeon->setDificultad($dificultad);
    $nuevoCampeon->setDescripcion($descripcion);

    // Llamar a la función add
    if (CampeonBD::add($nuevoCampeon)) {
        echo "Campeón agregado con éxito.";
    } else {
        echo "Error al agregar el campeón.";
    }
}
?>
