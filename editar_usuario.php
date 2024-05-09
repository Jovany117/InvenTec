<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/admin.css">
    <style>

        form {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 8px;
            justify-content: center;
            align-items: center;
            
        }

        label, input[type="checkbox"] {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
<a href="edutar_usuarios_admin.php"><img src="img/regreso.png" alt="Logo" class="logo"></a>
    <center><h1>Editar Usuario</h1></center>

    <?php
    require_once 'conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['user']) && isset($_GET['host'])) {
        $user = $_GET['user'];
        $host = $_GET['host'];

        echo "<form action='actualizar_usuario.php' method='post'>";
        echo "<input type='hidden' name='user_old' value='$user'>";
        echo "<input type='hidden' name='host_old' value='$host'>";

        echo "<label for='username'>Nuevo Username:</label>";
        echo "<input type='text' id='username' name='username' required><br><br>";

        echo "<label for='password'>Nueva Contraseña:</label>";
        echo "<input type='password' id='password' name='password' required><br><br>";

        echo "<input type='submit' value='Actualizar'>";
        echo "</form>";
    }
    ?>

</body>
</html>