<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input name="username" type="text" placeholder="Nombre de usuario" required>
                <i class='bx bxs-user'></i> 
            </div>
            <div class="input-box">
                <input name="password" type="password" placeholder="Contraseña" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember">
                <label>
                    <input type="checkbox" name="remember">
                    Recuérdame
                </label>
            </div>
            <button type="submit" class="btn">Entrar</button>
            <div class="register-link">               
                <p>No tienes una cuenta? <a href="#">Regístrate</a></p>
            </div>
        </form>
    </div>

    <?php
    // Inicia sesión
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Este método verifica si el formulario se envía correctamente
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Simulando dos usuarios existentes
        $users = [
            "admin" => ["password" => "1234", "role" => "admin"],
            "cliente1" => ["password" => "1234", "role" => "cliente"]
        ];

        // Verificar si el usuario existe y la contraseña es correcta
        if (array_key_exists($username, $users) && $users[$username]["password"] === $password) {
            // Establecer variables de sesión para el usuario
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $users[$username]["role"];
            $_SESSION['access_time'] = date("Y-m-d H:i:s");

            // Redirigir según el rol del usuario
            if ($_SESSION['role'] === "admin") {
                header("Location: opciones.php");
            } else {
                header("Location: lectura.php");
            }
            exit();
        } else {
            echo "Datos incorrectos. Inténtalo de nuevo.";
        }
    }
    ?>
</body>
</html>


