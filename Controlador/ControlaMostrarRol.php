<?php
include_once '../Modelo/CampeonBD.php';

try {
    // Obtener el rol ingresado desde el formulario
    $rolBuscado = isset($_POST['rol']) ? strtolower($_POST['rol']) : null;

    // Lógica para buscar campeones por rol desde el modelo
    $campeonesPorRol = CampeonBD::buscarPorRol($rolBuscado);

    // Mostrar la tabla HTML
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Campeones por Rol</title>
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
                text-transform: uppercase; /* Convertir texto a mayúsculas */
            }
        </style>
    </head>
    <body>
        <h1>Lista de Campeones por Rol: <?= strtoupper($rolBuscado) ?></h1>

        <?php if (!empty($campeonesPorRol)): ?>
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
                    <?php foreach ($campeonesPorRol as $campeon): ?>
                        <tr>
                            <td><?= $campeon->getId() ?></td>
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
            <p>No hay campeones para mostrar con el rol <?= strtoupper($rolBuscado) ?>.</p>
        <?php endif; ?>
    </body>
    </html>
    <?php
} catch (Exception $e) {
    // Manejo de errores (puedes personalizar el manejo según tus necesidades)
    echo "Error al buscar campeones por rol: " . $e->getMessage();
}
?>
