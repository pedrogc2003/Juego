<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Todos los Campeones</title>
    <style>
        /* Estilos para la tabla de resultados */
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
    <!-- Incluye jQuery desde CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <!-- Contenedor para mostrar los resultados -->
    <div id="resultados"></div>

    <!-- Script jQuery para cargar datos al abrir la página -->
    <script>
        // Función para cargar los datos al abrir la página
        $(document).ready(function() {
            cargarDatos();
        });

        // Función para realizar la solicitud AJAX y cargar datos
        function cargarDatos() {
            // Realizar solicitud AJAX al controlador
            $.ajax({
                url: '../Controlador/ControlaMostrarTodos.php',
                type: 'POST',
                dataType: 'html',
                success: function(response) {
                    // Mostrar resultados en el div 'resultados'
                    $('#resultados').html(response);
                },
                error: function(error) {
                    console.error('Error al cargar los datos:', error);
                }
            });
        }
    </script>
</body>
</html>
