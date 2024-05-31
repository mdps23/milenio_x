<?php

include ("conexion_db.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Hilo</title>
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
    <div class="contenedor" style="width: 40%;">
        <div class="bloque-colapsable">
            <h2>Nuevo Hilo</h2>
        </div>

        <div class="bloque-contenedor">
            <?php

            $conn = new mysqli('localhost', 'admin', 'contra', 'milenio_x');

            if ($conn->connect_error) {
                die("ERROR" . $conn->connect_error);
            }

            if (isset($_POST['id_user']) && isset($_POST['id_category']) && isset($_POST['title']) && isset($_POST['content'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $user = $_POST['id_user'];
                $category = $_POST['id_category'];

                $insert = "INSERT INTO threads (id_user, id_category, title, posts) VALUES ('$user', '$category', '$title', 0)";

                if ($conn->query($insert) === TRUE) {
                    $thread = $conn->insert_id;

                    $post = "INSERT INTO posts (id_thread, id_user, content) VALUES ('$thread', '$user', '$content')";

                    $update_th = "UPDATE threads SET posts = posts + 1 WHERE id_thread = '$thread'";
                    $update_cat = "UPDATE categories SET threads = threads + 1 WHERE id_category = '$category'";

                    if ($conn->query($post) === TRUE && $conn->query($update_th) === TRUE && $conn->query($update_cat) === TRUE) {
                        echo "<p>Hilo abierto con éxito</p>";
                        echo "<br>";
                        echo "<br>";
                        echo "<button><a href='./'>Volver</a></button>";
                    } else {
                        echo "Error al insertar post: " . $conn->error;
                        echo "<br>";
                        echo "<br>";
                        echo "<button><a href='./nuevo_hilo.php'>Volver</a></button>";
                    }
                } else {
                    echo "Error al abrir hilo: " . $conn->error;
                    echo "<br>";
                    echo "<br>";
                    echo "<button><a href='./nuevo_hilo.php'>Volver</a></button>";
                }
            } else {
                echo "<p>Parámetros faltantes</p>";
                echo "<br>";
                echo "<br>";
                echo "<button><a href='./nuevo_hilo.php'>Volver</a></button>";
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