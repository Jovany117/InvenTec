<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    require_once 'conexion.php';


    // Obtener el ID del usuario y los privilegios seleccionados
    $usuario_id = $_POST['usuarios'];
    $privilegios = $_POST['privilegios'];

    // Convertir los privilegios en formato de texto
    $permisos = implode(", ", $privilegios);

    // Actualizar la columna 'permisos' en la tabla 'usuarios'
    $sql_update = "UPDATE usuarios_privilegios SET permisos = '$permisos' WHERE id = $usuario_id";
    $result_update = $conn->query($sql_update);

    // Verificar si se ejecutó correctamente la consulta
    if ($result_update) {
        echo "Privilegios asignados correctamente.";
    } else {
        echo "Error al asignar privilegios: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "Error: El formulario no fue enviado correctamente.";
}
?>
