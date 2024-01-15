<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Campeones por Rol</title>
    <style>
        /* Estilos para el formulario y etiquetas */
        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <!-- Encabezado de la página -->
    <h1>Buscar Campeones por Rol</h1>

    <!-- Menú de navegación -->
    <div id="menu">
        <!-- Formulario para ir a la página de inserción de campeones -->
        <form action="formInsertar.php" method="get">
            <button type="submit">Insertar Campeon</button>
        </form>

        <!-- Formulario para ir a la página de mostrar todos los campeones -->
        <form action="formMostrarTodos.php" method="get">
            <button type="submit">Mostrar Campeones</button>
        </form>

        <!-- Formulario para ir a la página de consultar por rol -->
        <form action="formMostrarRol.php" method="get">
            <button type="submit">Consultar por Rol</button>
        </form>

        <!-- Formulario para ir a la página de actualizar campeones -->
        <form action="formActualizar.php" method="get">
            <button type="submit">Modificar Campeon</button>
        </form>

        <!-- Formulario para ir a la página de eliminar campeones -->
        <form action="formEliminar.php" method="get">
            <button type="submit">Eliminar Campeon</button>
        </form>
    </div>

    <!-- Formulario para buscar campeones por rol -->
    <form action="../Controlador/ControlaMostrarRol.php" method="post">
        <label for="rol">Rol:</label>
        <input type="text" id="rol" name="rol" required>

        <button type="submit">Buscar</button>
    </form>
</body>
</html>
