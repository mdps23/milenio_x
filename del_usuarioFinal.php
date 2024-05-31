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
            <h2>Borrar Usuario</h2>
        </div>

        <div class="bloque-contenedor">
            <?php

            if (isset($_POST['borrar'])) {
                $conn = new mysqli('localhost', 'admin', 'contra', 'milenio_x');

                if ($conn->connect_error) {
                    die("ERROR" . $conn->connect_error);
                }

                $user = $_SESSION['id_user'];

                $check = $conn->query("SELECT * FROM users WHERE id_user = '$user'");

                if ($check->num_rows > 0) {
                    $delete = "DELETE FROM users WHERE id_user = '$user'";

                    if ($conn->query($delete) === TRUE) {
                        echo "<p>Usuario borrado con éxito</p>";
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='logout.php'>Volver</a>";
                    } else {
                        echo "Error al borrar usuario: " . $conn->error;
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='perfil.php'>Volver</a>";
                    }
                }

                $conn->close();
            }
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