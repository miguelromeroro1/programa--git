<?php
$servername = "localhost";
$username = "tu_usuario_de_mysql";
$password = "tu_contraseña_de_mysql";
$dbname = "tu_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>
