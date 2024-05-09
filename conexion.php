<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "1793";
$dbname = "practica_php";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}
?>
