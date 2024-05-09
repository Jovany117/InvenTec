<?php
session_start();
require_once 'conexion.php'; // Incluye el archivo de conexión a la base de datos

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_perfil = $_POST['nombre_perfil'];

    // Prepara la declaración SQL para insertar un nuevo perfil
    $sql = "INSERT INTO perfiles (nombre_perfil) VALUES ('$nombre_perfil')";

    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Perfil creado exitosamente";
    } else {
        echo "Error al crear el perfil: " . $conn->error;
    }
}
?>
