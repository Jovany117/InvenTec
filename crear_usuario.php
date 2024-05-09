<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $privilegios = isset($_POST['privilegios']) ? $_POST['privilegios'] : [];

    // Crea el usuario con la contraseña y los privilegios
    $sql = "CREATE USER '$username'@'localhost' IDENTIFIED BY '$password'";
    if ($conn->query($sql) === TRUE) {
        // Asigna los privilegios al usuario
        foreach ($privilegios as $privilegio) {
            $sql_grant = "GRANT $privilegio ON *.* TO '$username'@'localhost'";
            $conn->query($sql_grant);
        }
        echo "<script>alert('Usuario registrado exitosamente'); window.location.href = 'crear_usuario_admin.html';</script>";
    } else {
        echo "Error al crear el usuario: " . $conn->error;
    }

    $conn->close();
}
?>
