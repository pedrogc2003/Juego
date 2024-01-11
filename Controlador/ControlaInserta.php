<?php
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
