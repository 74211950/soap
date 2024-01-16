<!DOCTYPE html>
<html>
<head>
    <title>Manejo de Datos</title>
</head>
<body>
    <h2>Manejo de Datos</h2>

    <!-- Formulario para insertar datos -->
    <form action="server.php" method="post">
        <input type="hidden" name="action" value="guardar_datos">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="dni">DNI:</label>
        <input type="text" name="dni" required>
        <br>
        <label for="edad">Edad:</label>
        <input type="text" name="edad" required>
        <br>
        <button type="submit">Guardar Datos</button>
    </form>

    <hr>

    <!-- Botón para mostrar todos los datos -->
    <form action="server.php" method="post">
        <input type="hidden" name="action" value="mostrar_todos_los_datos">
        <button type="submit">Mostrar Todos los Datos</button>
    </form>

    <?php
    // Procesamiento de las acciones
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["action"] == "guardar_datos") {
            // Llamada al servicio SOAP para guardar datos
            $client = new SoapClient(null, array('location' => 'http://localhost/server.php', 'uri' => 'http://localhost'));
            $response = $client->guardarDatos($_POST["nombre"], $_POST["dni"], $_POST["edad"]);
            echo "<p>$response</p>";
        } elseif ($_POST["action"] == "mostrar_todos_los_datos") {
            // Llamada al servicio SOAP para obtener todos los datos
            $client = new SoapClient(null, array('location' => 'http://localhost/server.php', 'uri' => 'http://localhost'));
            $data = $client->obtenerTodosLosDatos();
            echo "<p>Datos guardados:<br>$data</p>";
        }
    }
    ?>

</body>
</html>