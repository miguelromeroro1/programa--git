<?php
// Iniciar sesión para acceder a la variable $_SESSION
session_start();

// Verificar si el usuario está autenticado
$user = isset($_SESSION['login_success']) ? json_decode($_SESSION['login_success']) : false;

// Redirigir al usuario a la página de inicio de sesión si no está autenticado
if (!$user) {
    header('Location: login.php');
    exit;
}

// Obtener el botón de cierre de sesión
if (isset($_POST['logout'])) {
    // Borrar la sesión del usuario y redirigirlo a la página de inicio de sesión
    unset($_SESSION['login_success']);
    header('Location: login.php');
    exit;
}
?>

<!-- HTML y formulario para el botón de cierre de sesión -->
<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
</head>
<body>
	<h1>Bienvenido <?= $user->name ?>!</h1>
	<form method="POST">
		<button type="submit" name="logout">Cerrar sesión</button>
	</form>
</body>
</html>
