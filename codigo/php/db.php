<?php
// Archivo db.php

// Incluir el archivo de conexión a la base de datos (conexion.php)
include "conexion.php";

// Verificar si se ha enviado el formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos enviados por el formulario de edición
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Realizar la consulta de actualización en la base de datos
    $sql = "UPDATE usuarios SET nombre='$nombre', Mail='$email', Contraseña='$contrasena' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conn);
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
