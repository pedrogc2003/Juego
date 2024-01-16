<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para Agregar Usuario</title>
</head>
<body>

    <h2>Formulario para Agregar Usuario</h2>
    <div id="menu">
        <form action="formIniciarSesion.php" method="get">
            <button type="submit">Iniciar Sesion</button>
        </form>
    </div>
    <br>

    <form action="../Controlador/ControlaAgregarUsuario.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Insertar">
    </form>

</body>
</html>
