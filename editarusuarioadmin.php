<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/roles.css"> <!-- Agrega tu hoja de estilos CSS aquí -->
</head>
<body>
    <h1>Editar Usuario</h1>
    <?php
    // Conexión a la base de datos (reemplaza esto con tus detalles de conexión)
    require_once 'conexion.php';

    // Verificar si se ha enviado el formulario de edición
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $permisos = $_POST['permisos'];

        // Actualizar los datos del usuario en la base de datos
        $sql = "UPDATE usuarios_privilegios SET username='$username', permisos='$permisos' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Permisos guardados corectamente'); window.location.href = 'privilegiosusuarios.php';</script>";
        } else {
            echo "Error al actualizar el usuario: " . $conn->error;
        }
    }

    // Obtener el ID del usuario desde el parámetro de la URL
    $id = $_GET['id'];

    // Consultar los datos del usuario seleccionado
    $sql = "SELECT * FROM usuarios_privilegios WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar el formulario prellenado con la información del usuario
        $row = $result->fetch_assoc();
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>
        <label for="permisos">Permisos:</label>
        <input type="text" id="permisos" name="permisos" value="<?php echo $row['permisos']; ?>" required>
        <button type="submit">Actualizar Usuario</button>
    </form>
    <?php
    } else {
        echo "No se encontró el usuario.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>
