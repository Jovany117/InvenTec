<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Privilegios</title>
    <link rel="stylesheet" href="css/privilegios.css"> <!-- Enlaza tu hoja de estilos CSS aquí -->
</head>
<body>
    <div class="container">
        <h1>Asignar Privilegios</h1>
        
        <!-- Formulario para seleccionar el usuario -->
        <form id="formSeleccionarUsuario" action="asignar_privilegios.php" method="POST">
            <h2>Seleccionar Usuario</h2>
            <label for="usuario">Usuario:</label>
            <select id="usuario" name="usuario">
                <?php
                // Conectar a la base de datos
                require_once 'conexion.php';

                // Consultar los usuarios desde la base de datos
                $sql = "SELECT id, username FROM usuarios_privilegios";
                $result = $conn->query($sql);

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
        
        <!-- Formulario para asignar privilegios -->
        <form id="formAsignarPrivilegios" action="guardar_privilegios.php" method="POST" style="display: none;">
            <h2>Asignar Privilegios</h2>
            <ul>
                <li><input type="checkbox" id="crear" name="privilegios[]" value="crear"><label for="crear">Crear</label></li>
                <li><input type="checkbox" id="editar" name="privilegios[]" value="editar"><label for="editar">Editar</label></li>
                <li><input type="checkbox" id="eliminar" name="privilegios[]" value="eliminar"><label for="eliminar">Eliminar</label></li>
                <li><input type="checkbox" id="mostrar" name="privilegios[]" value="mostrar"><label for="mostrar">Mostrar</label></li>
                <!-- Repite la estructura <li> para cada privilegio -->
            </ul>
            <button type="submit" class="button2">Guardar Privilegios</button>
        </form>
    </div>

    <script>
        // Obtener el formulario de selección de usuario y el formulario de asignar privilegios
        const formSeleccionarUsuario = document.getElementById('formSeleccionarUsuario');
        const formAsignarPrivilegios = document.getElementById('formAsignarPrivilegios');

        // Agregar un evento de escucha al formulario de selección de usuario
        formSeleccionarUsuario.addEventListener('submit', function(event) {
            // Prevenir el envío del formulario
            event.preventDefault();
            
            // Mostrar el formulario de asignar privilegios
            formAsignarPrivilegios.style.display = 'block';
        });
    </script>
</body>
</html>
