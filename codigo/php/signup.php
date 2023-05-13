<?php
include "conexion.php";
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "1234"; // Deja el campo de contraseña vacío
$dbname = "nolonecesito.com"; // Nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener valores de los campos del formulario
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Verificar si el correo electrónico ya está registrado
    $sql = "SELECT id FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si el correo electrónico ya está registrado, mostrar una alerta
        echo '<script>alert("El usuario ya está registrado.");</script>';
    } else {
        // Si el correo electrónico no está registrado, agregar el nuevo usuario a la base de datos
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Si el usuario se ha agregado con éxito, mostrar un mensaje de confirmación
            echo '<script>alert("Registro exitoso.");</script>';
            // Redirigir a la página de inicio de sesión después de registrar un nuevo usuario
            echo '<script>window.location.href = "login.html";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

