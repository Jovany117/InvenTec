<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar, Eliminar y Modificar Permisos de Usuarios</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<a href="menu_administrador.html"><img src="img/regreso.png" alt="Logo" class="logo"></a>
    <center><h1>Editar Permisos</h1></center>
    <table>
        <tr>
            <th>Username</th>
            <th>Host</th>
            <th>Permisos</th>
            <th>Administrar permisos</th>
        </tr>
        <?php
        // Conexión a la base de datos (reemplaza esto con tus detalles de conexión)
        require_once 'conexion.php';

        // Consulta los usuarios de la base de datos
        $sql = "SELECT user, host, Select_priv, Insert_priv, Update_priv, Delete_priv, Create_priv, Drop_priv, Grant_priv FROM mysql.user";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Muestra cada usuario en la tabla
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["user"] . "</td>";
                echo "<td>" . $row["host"] . "</td>";
                echo "<td>SELECT: " . $row["Select_priv"] . ", INSERT: " . $row["Insert_priv"] . ", UPDATE: " . $row["Update_priv"] . ", DELETE: " . $row["Delete_priv"] . ", CREATE: " . $row["Create_priv"] . ", DROP: " . $row["Drop_priv"] . ", GRANT: " . $row["Grant_priv"] . "</td>";
                echo "<td><a href='cambiar_permisos.php?user=" . $row["user"] . "&host=" . $row["host"] . "'>Cambiar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay usuarios</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>


