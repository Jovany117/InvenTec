<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user']) && isset($_POST['host']) && isset($_POST['privilegios'])) {
    $user = $_POST['user'];
    $host = $_POST['host'];
    $privilegios_seleccionados = $_POST['privilegios'];

    // Revocar todos los privilegios al usuario
    $sql_revoke = "REVOKE ALL PRIVILEGES ON *.* FROM '$user'@'$host'";
    $conn->query($sql_revoke);

    // Asignar los privilegios seleccionados al usuario
    foreach ($privilegios_seleccionados as $privilegio) {
        $sql_grant = "GRANT $privilegio ON *.* TO '$user'@'$host' WITH GRANT OPTION";
        $conn->query($sql_grant);
    }

    echo "<script>alert('Usuario registrado exitosamente'); window.location.href = 'privilegiosusuarios.php';</script>";

    $conn->close();
}
?>
