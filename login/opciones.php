<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Opciones</title>
</head>
<body>
    <div class="wrapper">
        <h1>Opciones</h1>
        <?php
        session_start();
        // Inicia sesión con PHP

        if (isset($_SESSION['username'])) {
            //  Metodo que comprueba si el usuario ha iniciado sesión 
            echo "Bienvenido, " . $_SESSION['username'] . ".<br>";
            echo "Sesión iniciada en: " . $_SESSION['access_time'] . "<br>";
        } else {
            header("Location: index.html");
        }
        ?>
        <div class="botones">
        <form action="opciones.php" method="POST">
            <input class="boton" type="submit" name="rutaactual" value="Ruta actual"/>
            <br><br>
        </form>
        <form action="opciones.php" method="POST">
            <label for="nombre">Buscar:</label><br>
            <input type="text" id="nombre" name="busqueda" placeholder="Busca un fichero...">
            <input class="botonbuscar" type="submit" value="Buscar">
        </form>
            <br><br>
        <form action="opciones.php" method="POST">
            <input class="boton2" type="submit" name="crear"  value="Crear archivo"/>
        </form>
        </div>
    </div>
    <?php
    $ruta = getcwd()."";

if (isset($_POST['rutaactual'])) {
    // Obtener y mostrar la ruta actual
    echo $ruta;
}

if (isset($_POST['busqueda'])) {
    $nombreArchivo = $_POST['busqueda'];

    // Directorio actual del php
    $directorioActual = $ruta;

    // Ruta completa al archivo buscado
    $rutaArchivo = $directorioActual . '/' . $nombreArchivo;

    if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
        echo "El archivo '$nombreArchivo' existe en el directorio actual.";
    } else {
        echo "El archivo '$nombreArchivo' no existe en el directorio actual.";
    }
}


$nombreArchivo = 'nuevo_archivo.txt';
$contenido = 'Este es el contenido que se escribirá en el archivo.';


if (isset($_POST['crear'])) {
if ($archivo = fopen($nombreArchivo, 'w')) {
    // Escribe en el archivo
    fwrite($archivo, $contenido);

    // Cierra el archivo
    fclose($archivo);

    // Establece los permisos
    chmod($nombreArchivo, 0664);

    echo "El archivo '$nombreArchivo' se ha creado con exito uwu";
} else {
    echo "No se pudo crear el archivo '$nombreArchivo'.";
}
}
    ?>
</body>
</html>
