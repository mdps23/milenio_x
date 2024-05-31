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
            <form action="nuevo_hilo_post.php" method="post">
                <div>
                    <label for="title">Título:</label>
                    <input type="text" name="title" required>
                    <label for="id_category">Categoría:</label>
                    <input type="text" name="id_category" required>
                </div>
                <br>
                <textarea name="content" rows="12" cols="72" placeholder="Insertar texto..." required></textarea>
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>" required>
                <br>
                <br>
                <input type="submit" value="Crear">
                <button><a href="./">Volver</a></button>
            </form>
        </div>

    </div>

    <footer>
        <div class="contenedor">
            <p>Ovnifans S.A. - Todos los derechos deservados &copy; 2024</p>
        </div>
    </footer>

</body>

</html>