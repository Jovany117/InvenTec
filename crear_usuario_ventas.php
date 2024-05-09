<?php
session_start();
require_once 'conexion.php';
require_once 'log.php'; // Asegúrate de incluir el archivo log.php si no lo has hecho antes

function generarHash($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

$username = $_POST['username'];
$password = $_POST['password'];

$hashedPassword = generarHash($password);

$sql = "INSERT INTO usuarios_ventas (username, hashed_password) VALUES ('$username', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Usuario registrado exitosamente'); window.location.href = 'login_ventas.html';</script>";
    // Registrar evento de creación de usuario
    logEvent($username, "Creación de usuario", "Se ha creado un nuevo usuario: $username");
} else {
    echo "Error al registrar usuario: " . $conn->error;
    // Registrar evento de error de registro
    logEvent($username, "Error de registro", "No se pudo crear el usuario $username: " . $conn->error);
}

$conn->close();
?>
