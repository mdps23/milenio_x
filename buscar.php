<?php

include ("conexion_db.php");

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

    <section id="hilos">
        <div class="contenedor">
            <div class="bloque-colapsable">
                <h2>Hilos Abiertos</h2>
            </div>
            <div class="bloque-contenedor">
                <?php

                if (isset($_GET['b'])) {
                    $termino = $_GET['b'];

                    $sql = "SELECT threads.*, users.username FROM threads INNER JOIN users ON threads.id_user = users.id_user WHERE threads.title LIKE '%$termino%'";
                    $resultados = mysqli_sql($sql);
                    foreach ($resultados as $valor) {
                        echo "<div class='bloque-lista'>";
                        echo "<div class='lista-titulo'><a href='hilo.php?id=" . $valor['id_thread'] . "'>" . $valor['title'] . "</a></div>";
                        echo "<div class='lista-detalles'>";
                        echo "<div>" . $valor['username'] . "</div>";
                        echo "<div>Posts: " . $valor['posts'] . "</div>";
                        echo "<div>" . $valor['date_updated'] . "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Por favor, ingresa un término de búsqueda.</p>";
                }

                ?>
            </div>
        </div>
    </section>

    <section id="fondo">
        <div></div>
    </section>

    <footer>
        <div class="contenedor">
            <p>Ovnifans S.A. - Todos los derechos deservados &copy; 2024</p>
        </div>
    </footer>
</body>

</html>