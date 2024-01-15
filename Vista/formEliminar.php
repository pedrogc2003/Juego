<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Campeón por ID</title>
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
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <h1>Eliminar Campeón por ID</h1>

    <!-- Menú de navegación -->
    <div id="menu">
        <form action="formInsertar.php" method="get">
            <button type="submit">Insertar Campeon</button>
        </form>

        <form action="formMostrarTodos.php" method="get">
            <button type="submit">Mostrar Campeones</button>
        </form>

        <form action="formMostrarRol.php" method="get">
            <button type="submit">Consultar por Rol</button>
        </form>

        <form action="formActualizar.php" method="get">
            <button type="submit">Modificar Campeon</button>
        </form>

        <form action="formEliminar.php" method="get">
            <button type="submit">Eliminar Campeon</button>
        </form>
    </div>

    <!-- Formulario para eliminar un campeón por ID -->
    <form action="../Controlador/ControlaEliminar.php" method="get" onsubmit="return confirmarEliminar()">
        <label for="id">ID del Campeón:</label>
        <input type="text" id="id" name="id" required>
        <button type="submit">Eliminar</button>
    </form>

    <!-- Mostrar la tabla con los campeones -->
    <?php
    // Incluir la clase CampeonBD para obtener la lista de campeones
    include_once '../Modelo/CampeonBD.php';

    try {
        // Lógica para obtener todos los campeones desde el modelo
        $campeones = CampeonBD::mostrarTodos();

        if (!empty($campeones)) {
            echo "<h2>Lista de Todos los Campeones</h2>";
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nombre</th>";
            echo "<th>Rol</th>";
            echo "<th>Dificultad</th>";
            echo "<th>Descripción</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($campeones as $campeon) {
                echo "<tr>";
                echo "<td>{$campeon->getId()}</td>";
                echo "<td>{$campeon->getNombre()}</td>";
                echo "<td>{$campeon->getRol()}</td>";
                echo "<td>{$campeon->getDificultad()}</td>";
                echo "<td>{$campeon->getDescripcion()}</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No hay campeones para mostrar.</p>";
        }
    } catch (PDOException $e) {
        // Manejo de errores (puedes personalizar el manejo según tus necesidades)
        echo "Error al obtener la lista de campeones: " . $e->getMessage();
    }
    ?>

    <!-- Script JavaScript para confirmar la eliminación -->
    <script>
        function confirmarEliminar() {
            return confirm('¿Estás seguro de que deseas eliminar este campeón?');
        }
    </script>
</body>
</html>
