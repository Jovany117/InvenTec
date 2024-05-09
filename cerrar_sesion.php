<?php
session_start();
require_once 'log.php';

// Registrar evento de cierre de sesión
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $event_type = "Cierre de sesión";
    $details = "El usuario $username ha cerrado sesión";
    logEvent($username, $event_type, $details);
}

// Cerrar la sesión
session_unset();
session_destroy();

// Redirigir al inicio de sesión
header("Location: index.html");
exit();
?>
