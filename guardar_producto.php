<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    require_once 'conexion.php'; // Asegúrate de que este archivo contenga la conexión a tu base de datos

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];

    // Preparar la consulta SQL para insertar el producto
    $sql = "INSERT INTO productos (nombre, precio, stock, categoria) VALUES ('$nombre', '$precio', '$stock', '$categoria')";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Producto guardado corecttamente'); window.location.href = 'menu_ventas.html';</script>";
    } else {
        echo "Error al guardar el producto: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "Error: El formulario no fue enviado correctamente.";
}
?>
