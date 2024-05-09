<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    require_once 'conexion.php';

    // Obtener los datos del formulario
    $id = $_POST['id'];
    $username = $_POST['username'];
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $permisos = $_POST['permisos'];

    // Actualizar los datos del usuario en la base de datos
    $sql = "UPDATE usuarios_privilegios SET username='$username', hashed_password='$hashed_password', permisos='$permisos' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado exitosamente.";
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "Error: El formulario no fue enviado correctamente.";
}
?>
