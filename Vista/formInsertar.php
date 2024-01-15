<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para Agregar Campeón</title>
</head>
<body>

    <h2>Formulario para Agregar Campeón</h2>

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

    <!-- Formulario para agregar un nuevo campeón -->
    <form action="../Controlador/ControlaInserta.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="rol">Rol:</label>
        <input type="text" id="rol" name="rol" required><br>

        <label for="dificultad">Dificultad:</label>
        <input type="text" id="dificultad" name="dificultad" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>

        <input type="submit" value="Insertar">
    </form>

</body>
</html>
