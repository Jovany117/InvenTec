<?php
// Conexión a la base de datos (reemplaza esto con tus detalles de conexión)
require_once 'conexion.php';


// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar los datos de la tabla productos
$sql = "SELECT nombre, stock FROM productos";
$result = $conn->query($sql);

// Inicializar arrays para almacenar los nombres y stocks de los productos
$nombres = [];
$stocks = [];

// Recorrer los resultados y almacenar los datos en los arrays
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nombres[] = $row['nombre'];
        $stocks[] = $row['stock'];
    }
} else {
    echo "No se encontraron productos.";
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica de Productos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="css/graficas.css">

</head>
<body>
<a href="menu_analista.html"><img src="img/regreso.png" alt="Logo" class="logo"></a>
    <canvas id="graficaProductos" width="1000" height="700"></canvas>
    <button id="btnExportarExcel">Exportar a Excel</button>
    <script>
        // Obtener datos de PHP
        var nombres = <?php echo json_encode($nombres); ?>;
        var stocks = <?php echo json_encode($stocks); ?>;

        // Crear la gráfica
        var ctx = document.getElementById('graficaProductos').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: nombres,
                datasets: [{
                    label: 'Stock',
                    data: stocks,
                    backgroundColor: 'rgba(83.9, 39.6, 52.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Función para exportar la gráfica a Excel
        document.getElementById('btnExportarExcel').addEventListener('click', function() {
            var ws = XLSX.utils.aoa_to_sheet([nombres, stocks]);
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Productos');
            XLSX.writeFile(wb, 'productos.xlsx');
        });
    </script>
</body>
</html>
</body>
</html>
