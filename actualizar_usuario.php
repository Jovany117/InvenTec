<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_old']) && isset($_POST['host_old']) && isset($_POST['username']) && isset($_POST['password'])) {
    $user_old = $_POST['user_old'];
    $host_old = $_POST['host_old'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Actualiza el nombre de usuario y la contraseña
    $sql = "RENAME USER '$user_old'@'$host_old' TO '$username'@'$host_old'; SET PASSWORD FOR '$username'@'$host_old' = PASSWORD('$password')";
    if ($conn->multi_query($sql) === TRUE) {
        echo "<script>alert('Usuario registrado exitosamente'); window.location.href = 'edutar_usuarios_admin.php';</script>";
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }

    $conn->close();
}
?>