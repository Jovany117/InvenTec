<?php
// Conectar a la base de datos
require_once 'conexion.php'; // Asegúrate de que este archivo contenga la conexión a tu base de datos

// Consultar los productos desde la base de datos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="./css/ver_productos.css">
</head>
<body>
<a href="menu_ventas.html"><img src="img/regreso.png" alt="Logo" class="logo"></a>
    <div class="container">
        <h1>Lista de Productos</h1>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verificar si hay productos en la base de datos
                if ($result->num_rows > 0) {
                    // Iterar sobre cada fila de resultados
                    while ($row = $result->fetch_assoc()) {
                        // Imprimir una fila de la tabla para cada producto
                        echo "<tr>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['precio'] . "</td>";
                        echo "<td>" . $row['stock'] . "</td>";
                        echo "<td>" . $row['categoria'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Si no hay productos en la base de datos, imprimir una fila indicando que no hay productos disponibles
                    echo "<tr><td colspan='4'>No hay productos disponibles.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
