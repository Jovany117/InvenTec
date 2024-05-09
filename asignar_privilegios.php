<?php
// Conectar a la base de datos
require_once 'conexion.php';

// Consultar los usuarios desde la base de datos
$sql = "SELECT id, username FROM usuarios_privilegios";
$result = $conn->query($sql);
?>

<!-- Formulario para seleccionar el usuario -->
<form action="asignar_privilegios.php" method="POST">
    <h2>Seleccionar Usuario</h2>
    <label for="usuario">Usuario:</label>
    <select id="usuarios" name="usuarios">
        <?php
        // Verificar si hay usuarios en la base de datos
        if ($result->num_rows > 0) {
            // Iterar sobre cada fila de resultados
            while ($row = $result->fetch_assoc()) {
                // Imprimir una opción para cada usuario
                echo "<option value='" . $row['id'] . "'>" . $row['username'] . "</option>";
            }
        } else {
            // Si no hay usuarios en la base de datos, imprimir una opción predeterminada
            echo "<option value='' disabled selected>No hay usuarios disponibles</option>";
        }
        ?>
    </select>
    <button type="submit">Seleccionar Usuario</button>
</form>
