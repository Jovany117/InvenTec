<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Permisos</title>
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
<a href="privilegiosusuarios.php"><img src="img/regreso.png" alt="Logo" class="logo"></a>
    <center><h1>Cambiar Permisos</h1></center>

    <?php
    require_once 'conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['user']) && isset($_GET['host'])) {
        $user = $_GET['user'];
        $host = $_GET['host'];

        echo "<form action='actualizar_permisos.php' method='post'>";
        echo "<input type='hidden' name='user' value='$user'>";
        echo "<input type='hidden' name='host' value='$host'>";

        echo "<label for='select_priv'>SELECT:</label>";
        echo "<input type='checkbox' id='select_priv' name='privilegios[]' value='SELECT'><br>";

        echo "<label for='insert_priv'>INSERT:</label>";
        echo "<input type='checkbox' id='insert_priv' name='privilegios[]' value='INSERT'><br>";

        echo "<label for='update_priv'>UPDATE:</label>";
        echo "<input type='checkbox' id='update_priv' name='privilegios[]' value='UPDATE'><br>";

        echo "<label for='delete_priv'>DELETE:</label>";
        echo "<input type='checkbox' id='delete_priv' name='privilegios[]' value='DELETE'><br>";

        echo "<label for='create_priv'>CREATE:</label>";
        echo "<input type='checkbox' id='create_priv' name='privilegios[]' value='CREATE'><br>";

        echo "<label for='drop_priv'>DROP:</label>";
        echo "<input type='checkbox' id='drop_priv' name='privilegios[]' value='DROP'><br>";

        echo "<label for='grant_priv'>GRANT:</label>";
        echo "<input type='checkbox' id='grant_priv' name='privilegios[]' value='GRANT'><br><br>";

        echo "<input type='submit' value='Actualizar Permisos'>";
        echo "</form>";
    }
    ?>

</body>
</html>
