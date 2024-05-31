<?php

include ("conexion_db.php");

$username = $_SESSION['username'];
$id_user = $_SESSION['id_user'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milenio X</title>
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
            <h2><?php echo $username ?></h2>
        </div>
        <div class="bloque-contenedor">
            <?php
            $user = "SELECT * FROM users WHERE id_user = '$id_user'";
            $datos = mysqli_sql($user);

            foreach ($datos as $valor) {
                echo "<div class='bloque-post'>";
                echo "<div class='user-nick'>" . $valor['username'] . "</div>";
            }
            ?>
            <div class="camposform">
                <p>Modifica tus datos</p>
                <form action="mod_usuario.php" method="post">
                    <label for="n_username">Nuevo nombre:</label>
                    <input type="text" name="n_username">
                    <br>
                    <label for="n_email">Nuevo email:</label>
                    <input type="email" name="n_email">
                    <br>
                    <label for="n_password">Nueva contraseña:</label>
                    <input type="password" name="n_password">
                    <br>
                    <br>
                    <input type="submit" value="Cambiar">
                </form>
                <br>
                <button><a href='del_usuario.php'>Borrar cuenta</a></button>
            </div>
            <?php
            echo "</div>";
            ?>
        </div>

        <div class="bloque-colapsable">
            <h2>Posts de <?php echo $username ?></h2>
        </div>
        <div class="bloque-contenedor">
            <?php
            $sql = "SELECT posts.* FROM posts INNER JOIN users ON posts.id_user = users.id_user WHERE posts.id_user = '$id_user' ORDER BY posts.post_date DESC";
            $resultados = mysqli_sql($sql);
            foreach ($resultados as $valor) {
                echo "<div class='bloque-lista'>";
                echo "<div class='lista-titulo'><a href='hilo.php?id=" . $valor['id_thread'] . "'>" . $valor['content'] . "</a></div>";
                echo "<div class='lista-detalles'>";
                echo "<div><form action='del_post' method='post'><input type='hidden' name='del_id_post' value='" . $valor['id_post'] . "'><button type='submit' name='borrar'>Borrar post</button></form></div>";
                echo "<div>" . $valor['post_date'] . "</div>";
                echo "</div>";
                echo "</div>";
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