<?php
require_once 'conexion.php';

function logEvent($username, $event_type, $details) {
    global $conn; // Esta variable $conn debería ser tu conexión a la base de datos

    // Verificar si la conexión está establecida
    if ($conn === null) {
        echo "Error: No se ha establecido una conexión a la base de datos";
        return;
    }

    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO logs (timestamp, username, event_type, details) VALUES ('$timestamp', '$username', '$event_type', '$details')";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Error al registrar evento: " . $conn->error;
    }
}
?>
