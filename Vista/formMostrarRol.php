<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Campeones por Rol</title>
    <style>
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
    <h1>Buscar Campeones por Rol</h1>

    <form action="../Controlador/ControlaMostrarRol.php" method="post">
        <label for="rol">Rol:</label>
        <input type="text" id="rol" name="rol" required>

        <button type="submit">Buscar</button>
    </form>
</body>
</html>
