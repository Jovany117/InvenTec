<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    require_once 'conexion.php';

    // Obtener los datos del formulario
    $username = $_POST['username'];
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  

    // Insertar los datos del usuario en la base de datos
    $sql = "INSERT INTO usuarios_privilegios (username, hashed_password) VALUES ('$username', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuario guardado corectamente'); window.location.href = 'menu_administrador.html';</script>";
    
    } else {
        echo "Error al crear el usuario: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "Error: El formulario no fue enviado correctamente.";
}
?>
