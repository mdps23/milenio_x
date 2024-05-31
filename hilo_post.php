<?php

include ("conexion_db.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Milenio X
    </title>
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

    <div class="contenedor">
        <div class="bloque-colapsable">
            <h2>
                <br>
            </h2>
        </div>

        <div class="bloque-contenedor">
            <?php
            if ($_SESSION['logado'] == true) {
                $conn = new mysqli('localhost', 'admin', 'contra', 'milenio_x');
                if ($conn->connect_error) {
                    die("ERROR" . $conn->connect_error);
                }
                if (isset($_POST['id_thread']) && isset($_POST['post_id_user']) && isset($_POST['post_content'])) {
                    $thread = $_POST['id_thread'];
                    $user = $_POST['post_id_user'];
                    $content = $_POST['post_content'];
                    $insert = "INSERT INTO posts (id_thread, id_user, content) VALUES ('$thread', '$user', '$content')";
                    if ($conn->query($insert) === TRUE) {
                        $update = "UPDATE threads SET posts = posts + 1, date_updated = NOW() WHERE id_thread = '$thread'";
                        if ($conn->query($update) === TRUE) {
                            echo "<p>Post añadido con éxito</p>";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='./hilo.php?id=" . $thread . "'>Volver</a>";
                        } else {
                            echo "Error al actualizar hilo: " . $conn->error;
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='./hilo.php?id=" . $thread . "'>Volver</a>";
                        }
                    } else {
                        echo "Error al añadir post: " . $conn->error;
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='./hilo.php?id=" . $thread . "'>Volver</a>";
                    }
                } else {
                    echo "Parámetros faltantes";
                    echo "<br>";
                    echo "<br>";
                    echo "<a href='./hilo.php?id=" . $thread . "'>Volver</a>";
                }
                $conn->close();
            } else {
                echo "Debes iniciar sesión para postear";
                echo "<br>";
                echo "<br>";
                echo "<a href='./hilo.php?id=" . $thread . "'>Volver</a>";
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