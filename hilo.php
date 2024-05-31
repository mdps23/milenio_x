<?php

include ("conexion_db.php");

if (isset($_GET['id'])) {
    $id_hilo = $_GET['id'];
}

$sql_tit = "SELECT * FROM threads WHERE id_thread = '$id_hilo'";
$resultado_tit = mysqli_sql($sql_tit);
foreach ($resultado_tit as $valor) {
    $titulo = $valor['title'];
}

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
                <?php echo $titulo ?>
            </h2>
        </div>

        <?php
        $sql = "SELECT posts.*, users.username FROM posts INNER JOIN users ON posts.id_user = users.id_user WHERE id_thread = '$id_hilo' ORDER BY post_date ASC";
        $resultados = mysqli_sql($sql);
        foreach ($resultados as $valor) {
            echo "<div class='bloque-post'>";
            echo "<div class='post-autor'>" . $valor['username'] . "</div>";
            echo "<div class='post-contenido'><div>" . $valor['post_date'] . "</div>";
            echo "<p>" . $valor['content'] . "</p></div>";
            echo "</div>";
        }
        ?>

        <form action="hilo_post.php" method="post">
            <input type="hidden" name="id_thread" value="<?php echo $id_hilo; ?>" required>
            <input type="hidden" name="post_id_user" value="<?php echo $_SESSION['id_user']; ?>" required>
            <br>
            <textarea name="post_content" rows="12" cols="72" placeholder="Insertar texto..." required></textarea>
            <br>
            <input type="submit" value="Comentar">
            <button><a href="./">Volver</a></button>
        </form>

    </div>

    <footer>
        <div class="contenedor">
            <p>Ovnifans S.A. - Todos los derechos deservados &copy; 2024</p>
        </div>
    </footer>

</body>

</html>