<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Contraseña</title>
    <link rel="stylesheet" href="styles.css"> <!-- Agrega tu hoja de estilos CSS aquí -->
</head>
<body>
    <h1>Modificar Contraseña</h1>
    <?php
    // Verificar si se ha enviado el ID del usuario a modificar
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // Conectar a la base de datos
        require_once 'conexion.php';

        // Obtener el ID del usuario a modificar
        $id = $_GET['id'];

        // Consultar el username del usuario
        $sql = "SELECT username FROM usuarios_privilegios WHERE id = $id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $username = $row['username'];
            echo "<p>Modificando contraseña para el usuario: $username</p>";
            // Mostrar formulario para cambiar la contraseña
            echo "<form action='actualizar_contrasena.php' method='POST'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<label for='nueva_contrasena'>Nueva Contraseña:</label>";
            echo "<input type='password' id='nueva_contrasena' name='nueva_contrasena' required><br>";
            echo "<button type='submit'>Guardar Contraseña</button>";
            echo "</form>";
        } else {
            echo "No se encontró el usuario.";
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        echo "ID de usuario no válido.";
    }
    ?>
</body>
</html>
