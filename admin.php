<?php
require_once 'conexion.php';
// Obtener registros de la bitácora de eventos
$sql = "SELECT * FROM logs ORDER BY timestamp DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Registro de Autenticación</title>
</head>
<body>
    <div class="container">
    <a href="index.html"><img src="img/regreso.png" alt="Logo" class="logo"></a>
        <h2>Registro de Autenticación</h2>
        <table>
            <tr>
                <th>Fecha y Hora</th>
                <th>Usuario</th>
                <th>Tipo de Evento</th>
                <th>Detalles</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['timestamp'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['event_type'] . "</td>";
                    echo "<td>" . $row['details'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay registros de autenticación.</td></tr>";
            }
            ?>
        </table>
        <button id="btnExportarExcel">Exportar a Excel</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <script>
        document.getElementById('btnExportarExcel').addEventListener('click', function() {
            // Obtener datos de la tabla
            var table = document.querySelector('table');
            var data = [];
            var headers = [];
            for (var i = 0; i < table.rows[0].cells.length; i++) {
                headers[i] = table.rows[0].cells[i].innerText;
            }
            data.push(headers);
            for (var i = 1; i < table.rows.length; i++) {
                var tableRow = table.rows[i];
                var rowData = [];
                for (var j = 0; j < tableRow.cells.length; j++) {
                    rowData.push(tableRow.cells[j].innerText);
                }
                data.push(rowData);
            }

            // Crear libro de Excel y hoja de cálculo
            var ws = XLSX.utils.aoa_to_sheet(data);
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Registros de Autenticación');
            
            // Descargar archivo Excel
            XLSX.writeFile(wb, 'registros_autenticacion.xlsx');
        });
    </script>
</body>
</html>
