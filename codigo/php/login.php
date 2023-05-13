<?php
include "conexion.php";
// Verificamos si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtenemos los valores de los campos de correo electrónico y contraseña
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $dbPassword = "1234"; // Deja el campo de contraseña vacío
    $dbname = "nolonecesito.com"; // Nombre de tu base de datos

    $conn = new mysqli($servername, $username, $dbPassword, $dbname);

    // Verificamos si se ha establecido la conexión con la base de datos
    if ($conn->connect_error) {
        die('Error de conexión a la base de datos (' . $conn->connect_errno . ') '
            . $conn->connect_error);
    } else {
        // Escapamos los valores de correo electrónico y contraseña para evitar inyección de SQL
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);

        // Realizamos una consulta preparada para evitar inyección de SQL
        $sql = "SELECT * FROM users WHERE email=? AND password=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        // Obtenemos el resultado de la consulta
        $result = $stmt->get_result();

        // Si no se encuentra un usuario válido, mostramos una alerta al usuario
        if ($result->num_rows == 0) {
            echo "<script>alert('Usuario y/o contraseña incorrectos!');</script>";
        } else {
            // Si se encuentra un usuario válido, mostramos un mensaje de bienvenida y almacenamos su información en sesión
            $row = $result->fetch_assoc();
            $name = $row['name'];
            echo "<script>alert('Bienvenido $name!');</script>";
            session_start();
            $_SESSION['login_success'] = json_encode($row);
            // Redireccionamos al usuario a la página principal (index.php)
            echo "<script>window.location.href = 'index.php';</script>";
        }

        // Cerramos la consulta preparada y la conexión
        $stmt->close();
        $conn->close();
    }
}
?>
