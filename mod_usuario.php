<?php

include ("conexion_db.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <header>
        <div class="contenedor">
            <div class="bloque-cen">
                <a href="./index.php"><img src="img/milenio_logo_rojo.png" alt="Milenio X" width="150"></a>
                <h1>Milenio X</h1>
            </div>
            <nav>
                <ul>
                    <?php if ($_SESSION['logado'] == true) { ?>
                        <li><a href="./perfil.php">Mi Perfil</a></li>
                        <li><a href="./logout.php">Cerrar Sesión</a></li>
                    <?php } else { ?>
                        <li><a href="./registro.php">Regístrate</a></li>
                        <li><a href="./login.php">Inicia Sesión</a></li>
                    <?php } ?>
                    <li><a href="./nuevo_hilo.php">Abrir Hilo</a></li>
                </ul>
            </nav>
            <form action="buscar.php" method="GET">
                <input type="text" name="b" placeholder="Buscar hilos...">
                <button type="submit">Buscar</button>
            </form>
        </div>
    </header>

    <div class="contenedor" style="width: 30%;">
        <div class="bloque-colapsable">
            <h2>Modificar Datos de Usuario</h2>
        </div>

        <div class="bloque-contenedor">
            <?php

            $conn = new mysqli('localhost', 'admin', 'contra', 'milenio_x');

            if ($conn->connect_error) {
                die("ERROR" . $conn->connect_error);
            }

            if (isset($_POST['n_id_user']) && isset($_POST['n_username']) && isset($_POST['n_email']) && isset($_POST['n_password'])) {
                $id = $_POST['n_id_user'];
                $username = $_POST['n_username'];
                $email = $_POST['n_email'];
                $password = $_POST['n_password'];
                // $password = md5($_POST['n_password']);
            
                $check = $conn->query("SELECT * FROM users WHERE id_user = '$id'");

                if ($check->num_rows > 0) {
                    $update = "UPDATE users SET username = '$username', email = '$email', password = '$password' WHERE id_user = '$id'";

                    if ($conn->query($update) === TRUE) {
                        echo "<p>Datos de usuario actualizados</p>";
                        echo "<br>";
                        echo "<a href='perfil.php'>Volver</a>";
                    } else {
                        echo "Error al actualizar usuario: " . $conn->error;
                        echo "<br>";
                        echo "<a href='perfil.php'>Volver</a>";
                    }
                } else {
                    echo "Usuario no encontrado";
                    echo "<br>";
                    echo "<a href='perfil.php'>Volver</a>";
                }
            } else {
                echo "Parámetros faltantes";
                echo "<br>";
                echo "<a href='perfil.php'>Volver</a>";
            }

            $conn->close();

            ?>
        </div>

    </div>

    <footer>
        <div class="contenedor">
            <p>Ovnifans S.A. - Todos los derechos deservados &copy; 2024</p>
        </div>
    </footer>

</body>

</html>