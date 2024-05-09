<?php
session_start();

require_once 'conexion.php';
require_once 'log.php';

// Verificar si el captcha ingresado coincide con el captcha almacenado en la sesión
if ($_POST['captcha'] != $_SESSION['captcha']) {
    // El captcha ingresado es incorrecto, redirigir de vuelta al formulario con un mensaje de error
    logEvent($_POST['username'], "Intento de inicio de sesión fallido", "Intento fallido de iniciar sesión para el usuario: {$_POST['username']}. Captcha incorrecto.");
    echo "<script>alert('Captcha incorrecto'); window.location.href = 'login_analista.html';</script>";
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios_analista WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['hashed_password'];

    if (password_verify($password, $hashedPassword)) {
        $_SESSION['username'] = $username;
        logEvent($username, "Inicio de sesión exitoso", "El usuario $username inició sesión correctamente.");
        header("Location: menu_analista.html"); 
        exit(); 
    } else {
        logEvent($username, "Intento de inicio de sesión fallido", "Intento fallido de iniciar sesión para el usuario: $username");
        echo "<script>alert('Nombre de usuario o contraseña incorrectos');</script>";
        echo "<script>window.location.href = 'login_analista.html';</script>";
        exit(); 
    }
} else {
    logEvent($username, "Intento de inicio de sesión fallido", "Intento fallido de iniciar sesión para el usuario: $username");
    echo "<script>alert('Nombre de usuario o contraseña incorrectos'); window.location.href = 'login_analista.html';</script>";
}
?>
