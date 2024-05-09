<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['user']) && isset($_GET['host'])) {
    $user = $_GET['user'];
    $host = $_GET['host'];

    // Elimina el usuario de MySQL
    $sql = "DROP USER '$user'@'$host'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuario registrado exitosamente'); window.location.href = 'eliminar_usuarios_admin.php';</script>";
    } else {
        echo "Error al eliminar el usuario: " . $conn->error;
    }

    $conn->close();
}
?>
