<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="css/admin.css"> <!-- Agrega tu hoja de estilos CSS aquí -->
</head>
<body>
    <h1>Eliminar Usuario</h1>
    <?php
    // Conexión a la base de datos (reemplaza esto con tus detalles de conexión)
    require_once 'conexion.php';

    // Verificar si se ha enviado el formulario de confirmación
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];

        // Eliminar el usuario de la base de datos
        $sql = "DELETE FROM usuarios_privilegios WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Producto eliminado corecttamente'); window.location.href = 'eliminar_usuarios_admin.php';</script>";
        } else {
            echo "Error al eliminar el usuario: " . $conn->error;
        }
    }

    // Obtener el ID del usuario desde el parámetro de la URL
    $id = $_GET['id'];

    // Consultar los datos del usuario seleccionado
    $sql = "SELECT * FROM usuarios_privilegios WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los datos del usuario
        $row = $result->fetch_assoc();
        echo "<p>¿Estás seguro de que deseas eliminar al usuario '" . $row['username'] . "'?</p>";
        echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<button type='submit'>Eliminar</button>";
        echo "</form>";
    } else {
        echo "No se encontró el usuario.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>
