<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Productos</title>
    <link rel="stylesheet" href="./css/ver_productos.css">
</head>
<body>
<a href="menu_ventas.html"><img src="img/regreso.png" alt="Logo" class="logo"></a>
    <div class="container">
        <h1>Editar Productos</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conectar a la base de datos y obtener los productos
                require_once 'conexion.php';
                $sql = "SELECT * FROM productos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar cada producto en la tabla
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['precio'] . "</td>";
                        echo "<td>" . $row['stock'] . "</td>";
                        echo "<td>" . $row['categoria'] . "</td>";
                        echo "<td>";
                        echo "<a href='editar_producto.php?id=" . $row['id'] . "'>Editar</a> ";
                        
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay productos disponibles.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
    </div>
</body>
</html>
