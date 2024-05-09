<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bienvenida.css">
    <title>Bienvenida</title>
</head>
<body>
    <div class="container">
        <?php
        // Verificamos si el usuario ha iniciado sesión
        if (isset($_SESSION["username"])) {
            echo "<h2>Bienvenido, " . $_SESSION["username"] . "!</h2>";
            echo "<p><a href='cerrar_sesion.php'>Cerrar Sesión</a></p>";
        } else {
            // Si el usuario no ha iniciado sesión, redirigimos al inicio de sesión
            header("Location: index.html");
            exit();
        }
        ?>

        <a href="admin.php">ADMIN</a>
    </div>
</body>
</html>
