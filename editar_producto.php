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
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
        $precio = $row['precio'];
        $stock = $row['stock'];
        $categoria = $row['categoria'];
    } else {
        echo "No se encontró ningún producto con el ID proporcionado.";
        exit();
    }
} else {
    echo "ID de producto no proporcionado.";
    exit();
}

// Verificar si se ha enviado el formulario de actualización
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos actualizados del formulario
    $nombre_actualizado = $_POST['nombre'];
    $precio_actualizado = $_POST['precio'];
    $stock_actualizado = $_POST['stock'];
    $categoria_actualizada = $_POST['categoria'];

    // Actualizar la información del producto en la base de datos
    $sql_update = "UPDATE productos SET nombre = '$nombre_actualizado', precio = '$precio_actualizado', stock = '$stock_actualizado', categoria = '$categoria_actualizada' WHERE id = $producto_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "<script>alert('Producto editado corecttamente'); window.location.href = 'editar_productos_tabla.php';</script>";
    } else {
        echo "Error al actualizar el producto: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="./css/ver_productos.css">
</head>
<body>
<a href="menu_ventas.html"><img src="img/regreso.png" alt="Logo" class="logo"></a>
    <div class="container">
        <h1>Editar Producto</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $producto_id; ?>" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" value="<?php echo $precio; ?>" required>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="<?php echo $stock; ?>" required>
            <label for="categoria">Categoría:</label>
            <input type="text" id="categoria" name="categoria" value="<?php echo $categoria; ?>" required>
            <button type="submit" class="button">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
