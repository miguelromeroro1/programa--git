<?php
$servername = "localhost";
$username = "root";
$password = "1234"; // Contraseña de la base de datos
$dbname = "nolonecesito.com"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, '1234', $dbname);


// Verificar si hay errores de conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Establecer el conjunto de caracteres de la conexión
$conn->set_charset("utf8");

// Aquí puedes realizar operaciones adicionales de configuración de la conexión, si es necesario

?>
