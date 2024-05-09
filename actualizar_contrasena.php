<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    require_once 'conexion.php';

    // Obtener el ID del usuario y la nueva contraseña
    $id = $_POST['id'];
    $nueva_contrasena = $_POST['nueva_contrasena'];

    // Encriptar la nueva contraseña
    $hashed_password = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

    // Actualizar la contraseña en la base de datos
    $sql_update = "UPDATE usuarios_privilegios SET hashed_password = '$hashed_password' WHERE id = $id";
    $result_update = $conn->query($sql_update);

    // Verificar si se ejecutó correctamente la consulta
    if ($result_update) {
        echo "<script>alert('Contraseña actulizada corecttamente'); window.location.href = 'edutar_usuarios_admin.php';</script>";
    } else {
        echo "Error al actualizar la contraseña: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "Error: El formulario no fue enviado correctamente.";
}
?>
