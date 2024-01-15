<?php
// Incluye el archivo de la clase CampeonBD
include_once '../Modelo/CampeonBD.php';

try {
    // Lógica para obtener todos los campeones desde el modelo
    $campeones = CampeonBD::mostrarTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Todos los Campeones</title>
    <!-- Estilos CSS para la tabla -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <!-- Encabezado de la página -->
    <h1>Lista de Todos los Campeones</h1>

    <!-- Menú de navegación -->
    <div id="menu">
        <!-- Formularios para navegar a otras páginas -->
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

    <?php if (!empty($campeones)): ?>
        <!-- Tabla para mostrar los campeones encontrados -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Dificultad</th>
                    <th>Descripción</th>
                    <!-- Agrega más columnas según la estructura de tu tabla -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($campeones as $campeon): ?>
                    <tr>
                        <td><?= strtoupper($campeon->getId()) ?></td>
                        <td><?= strtoupper($campeon->getNombre()) ?></td>
                        <td><?= strtoupper($campeon->getRol()) ?></td>
                        <td><?= strtoupper($campeon->getDificultad()) ?></td>
                        <td><?= strtoupper($campeon->getDescripcion()) ?></td>
                        <!-- Agrega más celdas según la estructura de tu tabla -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <!-- Mensaje si no hay campeones para mostrar -->
        <p>No hay campeones para mostrar.</p>
    <?php endif; ?>
</body>
</html>

<?php
} catch (PDOException $e) {
    // Manejo de errores (puedes personalizar el manejo según tus necesidades)
    echo "Error al obtener la lista de campeones: " . $e->getMessage();
}
?>
