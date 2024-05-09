<?php
// Verificar si se ha proporcionado un ID de producto válido
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Conectar a la base de datos
    require_once 'conexion.php';

    // Obtener el ID del producto de la URL
    $producto_id = $_GET['id'];

    // Consultar la información del producto desde la base de datos
    $sql = "SELECT * FROM productos WHERE id = $producto_id";
    $result = $conn->query($sql);

    if($result->num_rows == 1) {
        // Eliminar el producto de la base de datos
        $sql_delete = "DELETE FROM productos WHERE id = $producto_id";

        if ($conn->query($sql_delete) === TRUE) {
            echo "<script>alert('Producto eliminado corecttamente'); window.location.href = 'eliminar_productos_tabla.php';</script>";
        } else {
            echo "Error al eliminar el producto: " . $conn->error;
        }
    } else {
        echo "No se encontró ningún producto con el ID proporcionado.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "ID de producto no proporcionado.";
}
?>
