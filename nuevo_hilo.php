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
            <h1><a href="./index.php.">Milenio X</a></h1>
            <nav>
                <ul>
                    <?php if ($_SESSION['logado'] == true) { ?>
                        <li><a href="./logout.php">Cerrar Sesión</a></li>
                    <?php } else { ?>
                        <li><a href="./registro.php">Regístrate</a></li>
                        <li><a href="./login.php">Inicia Sesión</a></li>
                    <?php } ?>
                    <li><a href="./nuevo_hilo.php">Abrir Hilo</a></li>
                    <li><a href="#">Mapa</a></li>
                </ul>
            </nav>
            <form action="buscar.php" method="GET">
                <input type="text" name="b" placeholder="Buscar hilos...">
                <button type="submit">Buscar</button>
            </form>
        </div>
    </header>

    <div class="contenedor">
        <h2>Nuevo Hilo</h2>

        <form action="nuevo_hilo_post.php" method="post">
            <label for="title">Título:</label>
            <input type="text" name="title" required>
            <br>
            <label for="id_category">Categoría:</label>
            <input type="text" name="id_category" required>
            <br>
            <textarea name="content" rows="12" cols="72" placeholder="Insertar texto..." required></textarea>
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>" required>
            <br>
            <input type="submit" value="Crear">
        </form>

        <button><a href="./">Volver</a></button>
    </div>

    <footer>
        <div class="contenedor">
            <p>Ovnifans S.A. - Todos los derechos deservados &copy; 2024</p>
        </div>
    </footer>

</body>

</html>