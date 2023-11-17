<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Lectura</title>
</head>
<body>
    <div class="wrapper">
        <h1>Lectura</h1>
        <?php
        session_start();
        // Verifica la sesión con PHP

        if (isset($_SESSION['username']) && $_SESSION['role'] === 'cliente') {
            // Comprueba si el usuario ha iniciado sesion como cliente1
            echo "Bienvenido, " . $_SESSION['username'] . ".<br>";
            echo "Sesión iniciada en: " . $_SESSION['access_time'] . "<br>";
        } else {
            header("Location: index.html");
        }
        ?>
        <div class="contenido-lectura">
            <?php
            // Muestra la ruta actual
            $rutaActual = getcwd();
            echo "<p>Ruta actual: $rutaActual</p>";
            ?>
            <form action="lectura.php" method="POST">
                <label for="nombre">Buscar:</label><br>
                <input type="text" id="nombre" name="busqueda" placeholder="Busca un fichero...">
                <input class="botonbuscar" type="submit" value="Buscar">
            </form>
            <?php
            // búsqueda de archivos
            if (isset($_POST['busqueda'])) {
                $nombreArchivo = $_POST['busqueda'];
                $directorioActual = getcwd();
                $rutaArchivo = $directorioActual . '/' . $nombreArchivo;

                if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
                    echo "El archivo '$nombreArchivo' existe en la ruta actual.";
                } else {
                    echo "El archivo '$nombreArchivo' no existe en la ruta actual.";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
